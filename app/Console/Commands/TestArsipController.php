<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ArsipPerencanaanModel;
use App\Http\Controllers\ArsipPerencanaanController;
use App\Services\ArsipPerencanaanService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TestArsipController extends Command
{
    protected $signature = 'test:arsip-controller';
    protected $description = 'Test arsip perencanaan controller';

    public function handle()
    {
        // Login user
        $user = User::where('email', 'test@example.com')->first();
        Auth::login($user);
        
        $this->info("Logged in as: " . Auth::user()->name);
        
        // Get first arsip
        $arsip = ArsipPerencanaanModel::where('status', '!=', 9)->first();
        
        if (!$arsip) {
            $this->error("No arsip found");
            return;
        }
        
        $this->info("Testing controller for arsip ID: {$arsip->id}");
        
        // Test with invalid data
        try {
            $service = new ArsipPerencanaanService();
            $controller = new ArsipPerencanaanController($service);
            
            $request = new Request();
            $request->merge([
                'tahun' => 1999, // Invalid year
                'judul' => '', // Empty title
                '_token' => csrf_token()
            ]);
            $request->setMethod('PUT');
            
            // Test validation first
            $rules = [
                'tahun' => 'required|integer|min:2000|max:2100',
                'judul' => 'required|string|max:255',
                'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240',
            ];
            
            $messages = [
                'tahun.required' => 'Tahun harus diisi',
                'tahun.integer' => 'Tahun harus berupa angka',
                'tahun.min' => 'Tahun minimal 2000',
                'tahun.max' => 'Tahun maksimal 2100',
                'judul.required' => 'Judul harus diisi',
                'judul.string' => 'Judul harus berupa teks',
                'judul.max' => 'Judul maksimal 255 karakter',
                'file.file' => 'File harus berupa file',
                'file.mimes' => 'File harus berupa PDF, DOC, DOCX, XLS, XLSX, PPT, atau PPTX',
                'file.max' => 'File maksimal 10MB',
            ];
            
            $validator = Validator::make($request->all(), $rules, $messages);
            
            if ($validator->fails()) {
                $this->info("✓ Validation correctly failed for invalid data");
                foreach ($validator->errors()->all() as $error) {
                    $this->info("  - " . $error);
                }
            } else {
                $this->error("✗ Validation should have failed for invalid data");
            }
            
            // Test controller
            $response = $controller->update($request, $arsip->id);
            
            $this->error("✗ Controller should have failed but didn't");
            $this->info("Response type: " . get_class($response));
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->info("✓ Controller correctly failed with validation error");
            foreach ($e->errors() as $field => $errors) {
                foreach ($errors as $error) {
                    $this->info("  - {$field}: {$error}");
                }
            }
        } catch (\Exception $e) {
            $this->info("✓ Controller correctly failed: " . $e->getMessage());
        }
    }
}
