<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ArsipPerencanaanModel;
use Illuminate\Support\Facades\Auth;

class TestArsipView extends Command
{
    protected $signature = 'test:arsip-view';
    protected $description = 'Test arsip perencanaan view rendering';

    public function handle()
    {
        // Login user
        $user = User::where('email', 'test@example.com')->first();
        Auth::login($user);
        
        // Get data
        $arsipPerencanaan = ArsipPerencanaanModel::where('status', '!=', 9)->orderBy('tahun', 'desc')->get();
        
        $this->info("Arsip count: " . $arsipPerencanaan->count());
        
        // Test view rendering
        try {
            $view = view('admin.arsip_perencanaan.index', compact('arsipPerencanaan'));
            $html = $view->render();
            
            $this->info("View rendered successfully");
            $this->info("HTML length: " . strlen($html));
            
            // Check if key elements exist
            if (strpos($html, 'Daftar Arsip Perencanaan') !== false) {
                $this->info("✓ Title found");
            } else {
                $this->error("✗ Title not found");
            }
            
            if (strpos($html, 'Tambah Arsip Perencanaan') !== false) {
                $this->info("✓ Add button found");
            } else {
                $this->error("✗ Add button not found");
            }
            
            if (strpos($html, 'datatable') !== false) {
                $this->info("✓ DataTable found");
            } else {
                $this->error("✗ DataTable not found");
            }
            
        } catch (\Exception $e) {
            $this->error("View rendering error: " . $e->getMessage());
        }
    }
}
