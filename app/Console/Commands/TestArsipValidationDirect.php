<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ArsipPerencanaanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestArsipValidationDirect extends Command
{
    protected $signature = 'test:arsip-validation-direct';
    protected $description = 'Test arsip perencanaan validation directly';

    public function handle()
    {
        // Login user
        $user = User::where('email', 'test@example.com')->first();
        Auth::login($user);
        
        $this->info("Testing validation directly");
        
        // Test validation rules
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
        
        // Test 1: Valid data
        $this->info("\n=== Test 1: Valid Data ===");
        $validData = [
            'tahun' => 2025,
            'judul' => 'Test Validation - ' . now()->format('H:i:s'),
        ];
        
        $validator = Validator::make($validData, $rules, $messages);
        
        if ($validator->fails()) {
            $this->error("✗ Validation failed for valid data");
            foreach ($validator->errors()->all() as $error) {
                $this->error("  - " . $error);
            }
        } else {
            $this->info("✓ Validation passed for valid data");
        }
        
        // Test 2: Invalid data
        $this->info("\n=== Test 2: Invalid Data ===");
        $invalidData = [
            'tahun' => 1999, // Too old
            'judul' => '', // Empty
        ];
        
        $validator = Validator::make($invalidData, $rules, $messages);
        
        if ($validator->fails()) {
            $this->info("✓ Validation correctly failed for invalid data");
            foreach ($validator->errors()->all() as $error) {
                $this->info("  - " . $error);
            }
        } else {
            $this->error("✗ Validation should have failed for invalid data");
        }
        
        // Test 3: Request validation
        $this->info("\n=== Test 3: Request Validation ===");
        $request = new Request();
        $request->merge([
            'tahun' => 1999,
            'judul' => '',
        ]);
        
        try {
            $validatedData = $request->validate($rules, $messages);
            $this->error("✗ Request validation should have failed but didn't");
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->info("✓ Request validation correctly failed");
            foreach ($e->errors() as $field => $errors) {
                foreach ($errors as $error) {
                    $this->info("  - {$field}: {$error}");
                }
            }
        } catch (\Exception $e) {
            $this->error("✗ Unexpected error: " . $e->getMessage());
        }
    }
}