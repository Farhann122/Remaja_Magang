<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TestArsipWithAuth extends Command
{
    protected $signature = 'test:arsip-auth';
    protected $description = 'Test arsip perencanaan with authentication';

    public function handle()
    {
        // Login user
        $user = User::where('email', 'test@example.com')->first();
        
        if (!$user) {
            $this->error("User not found");
            return;
        }
        
        // Simulate login
        Auth::login($user);
        $this->info("Logged in as: " . Auth::user()->name);
        
        // Test controller
        try {
            $service = new \App\Services\ArsipPerencanaanService();
            $controller = new \App\Http\Controllers\ArsipPerencanaanController($service);
            
            $response = $controller->index();
            $this->info("Controller works with auth");
            
            $data = $response->getData();
            if (isset($data['arsipPerencanaan'])) {
                $this->info("Arsip count: " . count($data['arsipPerencanaan']));
            }
            
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }
    }
}
