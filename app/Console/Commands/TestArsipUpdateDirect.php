<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ArsipPerencanaanModel;
use App\Services\ArsipPerencanaanService;
use Illuminate\Http\Request;

class TestArsipUpdateDirect extends Command
{
    protected $signature = 'test:arsip-update-direct';
    protected $description = 'Test arsip perencanaan update directly';

    public function handle()
    {
        try {
            $this->info('Testing arsip perencanaan update directly...');
            
            // Get first arsip
            $arsip = ArsipPerencanaanModel::first();
            if (!$arsip) {
                $this->error('No arsip found');
                return;
            }
            
            $this->info('Found arsip: ' . $arsip->judul);
            
            // Test controller update method
            $controller = new \App\Http\Controllers\ArsipPerencanaanController(new ArsipPerencanaanService());
            
            // Create a mock request
            $request = new Request();
            $request->merge([
                'tahun' => 2025,
                'judul' => 'Updated Test Arsip via Controller',
                'file' => null
            ]);
            
            // Test the update method
            $response = $controller->update($request, $arsip->id);
            $this->info('Update response type: ' . get_class($response));
            
            // Check if it's a redirect response
            if ($response instanceof \Illuminate\Http\RedirectResponse) {
                $this->info('Redirect URL: ' . $response->getTargetUrl());
                $this->info('Session data: ' . json_encode($response->getSession()->all()));
            }
            
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            $this->error('Trace: ' . $e->getTraceAsString());
        }
    }
}