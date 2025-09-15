<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class ResetUserPassword extends Command
{
    protected $signature = 'user:reset-password';
    protected $description = 'Reset user password to password';

    public function handle()
    {
        $user = User::where('email', 'test@example.com')->first();
        
        if ($user) {
            $user->update(['password' => bcrypt('password')]);
            $this->info('Password reset successfully for test@example.com');
            $this->info('Email: test@example.com');
            $this->info('Password: password');
        } else {
            $this->error('User not found');
        }
    }
}