<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use RealRashid\SweetAlert\Facades\Alert;

class TestSweetAlert extends Command
{
    protected $signature = 'test:sweetalert';
    protected $description = 'Test SweetAlert functionality';

    public function handle()
    {
        try {
            Alert::success('Berhasil', 'Test SweetAlert berhasil!');
            $this->info("✓ SweetAlert Alert::success() works");
            
            Alert::error('Error', 'Test SweetAlert error!');
            $this->info("✓ SweetAlert Alert::error() works");
            
        } catch (\Exception $e) {
            $this->error("✗ SweetAlert error: " . $e->getMessage());
        }
    }
}
