<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ArsipPerencanaanModel;

class CheckArsipData extends Command
{
    protected $signature = 'check:arsip-data {id}';
    protected $description = 'Check arsip data';

    public function handle()
    {
        $id = $this->argument('id');
        
        $arsip = ArsipPerencanaanModel::find($id);
        
        if (!$arsip) {
            $this->error("Arsip with ID {$id} not found");
            return;
        }
        
        $this->info("Arsip ID: {$arsip->id}");
        $this->info("Tahun: {$arsip->tahun}");
        $this->info("Judul: {$arsip->judul}");
        $this->info("File Name: " . ($arsip->file_name ?? 'NULL'));
        $this->info("File Path: " . ($arsip->file_path ?? 'NULL'));
        $this->info("File Size: " . ($arsip->file_size ?? 'NULL'));
        $this->info("Status: {$arsip->status}");
        
        // Check if file_name is not null and not empty
        if (!empty($arsip->file_name)) {
            $this->info("✓ File name is not empty - should show file display");
        } else {
            $this->info("✗ File name is empty - will not show file display");
        }
    }
}