<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ArsipPerencanaanModel;
use Illuminate\Support\Facades\Storage;

class CreateArsipWithFile extends Command
{
    protected $signature = 'create:arsip-with-file';
    protected $description = 'Create arsip with file for testing';

    public function handle()
    {
        // Create a dummy file
        $fileName = 'test-file-' . time() . '.txt';
        $filePath = 'arsip/' . $fileName;
        $fileContent = 'This is a test file for arsip perencanaan.';
        
        Storage::disk('public')->put($filePath, $fileContent);
        
        // Create arsip record
        $arsip = ArsipPerencanaanModel::create([
            'tahun' => 2025,
            'judul' => 'Test Arsip with File - ' . now()->format('H:i:s'),
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_size' => strlen($fileContent),
            'status' => 1,
            'user_input' => 'admin',
            'tanggal_input' => now()
        ]);
        
        $this->info("Created arsip with file:");
        $this->info("ID: {$arsip->id}");
        $this->info("File Path: {$arsip->file_path}");
        $this->info("File Name: {$arsip->file_name}");
        $this->info("File Size: {$arsip->file_size} bytes");
    }
}
