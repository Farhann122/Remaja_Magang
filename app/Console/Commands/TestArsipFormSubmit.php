<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ArsipPerencanaanModel;
use App\Http\Controllers\ArsipPerencanaanController;
use App\Services\ArsipPerencanaanService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TestArsipFormSubmit extends Command
{
    protected $signature = 'test:arsip-form-submit';
    protected $description = 'Test arsip perencanaan form submission';

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
        
        $this->info("Testing form submission for arsip ID: {$arsip->id}");
        $this->info("Current judul: {$arsip->judul}");
        
        // Test form submission with valid data
        try {
            $service = new ArsipPerencanaanService();
            $controller = new ArsipPerencanaanController($service);
            
            $request = new Request();
            $request->merge([
                'tahun' => 2025,
                'judul' => 'Form Submit Test - ' . now()->format('H:i:s'),
                '_token' => csrf_token()
            ]);
            $request->setMethod('PUT');
            
            $response = $controller->update($request, $arsip->id);
            
            $this->info("✓ Form submission successful");
            $this->info("Response type: " . get_class($response));
            
            if (method_exists($response, 'getTargetUrl')) {
                $this->info("✓ Redirect URL: " . $response->getTargetUrl());
            }
            
            // Check if data was updated
            $updatedArsip = ArsipPerencanaanModel::find($arsip->id);
            $this->info("✓ Updated judul: {$updatedArsip->judul}");
            
        } catch (\Exception $e) {
            $this->error("✗ Form submission failed: " . $e->getMessage());
        }
    }
}