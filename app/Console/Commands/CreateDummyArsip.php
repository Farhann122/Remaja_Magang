<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ArsipPerencanaanModel;

class CreateDummyArsip extends Command
{
    protected $signature = 'create:dummy-arsip';
    protected $description = 'Create dummy arsip perencanaan data';

    public function handle()
    {
        try {
            $this->info('Creating dummy arsip perencanaan data...');
            
            ArsipPerencanaanModel::create([
                'tahun' => 2025,
                'judul' => 'Arsip Perencanaan Test',
                'file_path' => 'arsip/test.pdf',
                'file_name' => 'test.pdf',
                'file_size' => 1024,
                'status' => 1,
                'user_input' => 'admin',
                'tanggal_input' => now()
            ]);
            
            $this->info('Dummy data created successfully!');
            
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }
    }
}