<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ArsipPerencanaanModel;
use App\Http\Controllers\ArsipPerencanaanController;
use App\Services\ArsipPerencanaanService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TestDeleteFile extends Command
{
    protected $signature = 'test:delete-file';
    protected $description = 'Test delete file functionality';

    public function handle()
    {
        // Login user
        $user = User::where('email', 'test@example.com')->first();
        Auth::login($user);
        
        $this->info("Logged in as: " . Auth::user()->name);
        
        // Get first arsip with file
        $arsip = ArsipPerencanaanModel::where('status', '!=', 9)
            ->whereNotNull('file_path')
            ->first();
        
        if (!$arsip) {
            $this->error("No arsip with file found");
            return;
        }
        
        $this->info("Testing delete file for arsip ID: {$arsip->id}");
        $this->info("File path: {$arsip->file_path}");
        
        // Test controller deleteFile method
        try {
            $service = new ArsipPerencanaanService();
            $controller = new ArsipPerencanaanController($service);
            
            $request = new Request();
            $request->headers->set('X-Requested-With', 'XMLHttpRequest');
            $request->headers->set('Accept', 'application/json');
            
            $response = $controller->deleteFile($arsip->id);
            
            $this->info("✓ Delete file controller works");
            $this->info("Response type: " . get_class($response));
            
            if (method_exists($response, 'getData')) {
                $data = $response->getData(true);
                $this->info("Response data: " . json_encode($data));
            }
            
        } catch (\Exception $e) {
            $this->error("✗ Delete file controller error: " . $e->getMessage());
        }
    }
}
