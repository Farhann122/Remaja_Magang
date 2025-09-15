<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ArsipPerencanaanModel;
use App\Http\Controllers\ArsipPerencanaanController;
use App\Services\ArsipPerencanaanService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TestArsipControllerSimple extends Command
{
    protected $signature = 'test:arsip-controller-simple';
    protected $description = 'Test arsip perencanaan controller simple';

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
        
        $this->info("Testing controller simple for arsip ID: {$arsip->id}");
        
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
            
            $this->info("Request data: " . json_encode($request->all()));
            
            $response = $controller->update($request, $arsip->id);
            
            $this->error("✗ Controller should have failed but didn't");
            $this->info("Response type: " . get_class($response));
            
            if (method_exists($response, 'getTargetUrl')) {
                $this->info("Redirect URL: " . $response->getTargetUrl());
            }
            
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
