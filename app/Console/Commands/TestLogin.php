<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TestLogin extends Command
{
    protected $signature = 'test:login';
    protected $description = 'Test user login';

    public function handle()
    {
        // Cek user test@example.com
        $user = User::where('email', 'test@example.com')->first();
        
        if (!$user) {
            $this->error("User test@example.com not found");
            return;
        }
        
        $this->info("User found: {$user->name} ({$user->email})");
        
        // Test password
        if (Hash::check('password', $user->password)) {
            $this->info("Password is correct");
        } else {
            $this->error("Password is incorrect");
        }
        
        // Test login
        if (Auth::attempt(['email' => 'test@example.com', 'password' => 'password'])) {
            $this->info("Login successful");
            $this->info("Authenticated user: " . Auth::user()->name);
        } else {
            $this->error("Login failed");
        }
    }
}
