<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ArsipPerencanaanModel;

class TestDatabase extends Command
{
    protected $signature = 'test:database';
    protected $description = 'Test database connection and arsip perencanaan model';

    public function handle()
    {
        try {
            $this->info('Testing database connection...');
            
            $count = ArsipPerencanaanModel::count();
            $this->info('Arsip Perencanaan count: ' . $count);
            
            $this->info('Database connection successful!');
            
        } catch (\Exception $e) {
            $this->error('Database error: ' . $e->getMessage());
        }
    }
}