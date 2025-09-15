<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ArsipPerencanaanModel;

class CheckArsipFiles extends Command
{
    protected $signature = 'check:arsip-files';
    protected $description = 'Check arsip files data';

    public function handle()
    {
        $arsips = ArsipPerencanaanModel::where('status', '!=', 9)->get();
        
        $this->info("Total arsip: " . $arsips->count());
        
        foreach ($arsips as $arsip) {
            $this->info("ID: {$arsip->id}, File Path: " . ($arsip->file_path ?? 'NULL') . ", File Name: " . ($arsip->file_name ?? 'NULL'));
        }
        
        $withFiles = $arsips->whereNotNull('file_path');
        $this->info("Arsip with files: " . $withFiles->count());
    }
}
