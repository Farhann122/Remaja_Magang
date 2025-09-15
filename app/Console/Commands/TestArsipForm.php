<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ArsipPerencanaanModel;
use App\Http\Controllers\ArsipPerencanaanController;
use App\Services\ArsipPerencanaanService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TestArsipForm extends Command
{
    protected $signature = 'test:arsip-form';
    protected $description = 'Test arsip perencanaan form submission';

    public function handle()
    {
        // Login user
        $user = User::where('email', 'test@example.com')->first();
        Auth::login($user);
        
        // Get first arsip
        $arsip = ArsipPerencanaanModel::where('status', '!=', 9)->first();
        
        if (!$arsip) {
            $this->error("No arsip found");
            return;
        }
        
        $this->info("Testing form submission for arsip ID: {$arsip->id}");
        
        // Test controller update
        try {
            $service = new ArsipPerencanaanService();
            $controller = new ArsipPerencanaanController($service);
            
            // Create mock request
            $request = new Request();
            $request->merge([
                'tahun' => 2025,
                'judul' => 'Test Update via Form - ' . now()->format('H:i:s'),
                '_token' => csrf_token()
            ]);
            $request->setMethod('PUT');
            
            $response = $controller->update($request, $arsip->id);
            
            $this->info("✓ Controller update successful");
            $this->info("Response type: " . get_class($response));
            
            if (method_exists($response, 'getTargetUrl')) {
                $this->info("Redirect URL: " . $response->getTargetUrl());
            }
            
        } catch (\Exception $e) {
            $this->error("✗ Controller update error: " . $e->getMessage());
            $this->error("Stack trace: " . $e->getTraceAsString());
        }
    }
}
