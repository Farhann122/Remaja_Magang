<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ArsipPerencanaanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class TestArsipSimple extends Command
{
    protected $signature = 'test:arsip-simple {id}';
    protected $description = 'Test arsip edit view simple';

    public function handle()
    {
        $id = $this->argument('id');
        
        // Login user
        $user = User::where('email', 'test@example.com')->first();
        Auth::login($user);
        
        $this->info("Logged in as: " . Auth::user()->name);
        
        // Get arsip
        $arsipPerencanaan = ArsipPerencanaanModel::find($id);
        
        if (!$arsipPerencanaan) {
            $this->error("Arsip with ID {$id} not found");
            return;
        }
        
        $this->info("Testing edit view for arsip ID: {$id}");
        $this->info("File name: " . ($arsipPerencanaan->file_name ?? 'NULL'));
        
        try {
            // Render view
            $view = View::make('admin.arsip_perencanaan.edit', [
                'arsipPerencanaan' => $arsipPerencanaan,
                'errors' => new \Illuminate\Support\ViewErrorBag()
            ]);
            
            $html = $view->render();
            
            $this->info("✓ View rendered successfully");
            $this->info("HTML length: " . strlen($html));
            
            // Check if upload section exists
            if (strpos($html, 'Upload File:') !== false) {
                $this->info("✓ Upload section found in HTML");
            } else {
                $this->error("✗ Upload section NOT found in HTML");
            }
            
            // Check if file display exists
            if (strpos($html, 'class="file-display"') !== false) {
                $this->info("✓ File display found in HTML");
            } else {
                $this->info("✗ File display NOT found in HTML (expected if no file)");
            }
            
        } catch (\Exception $e) {
            $this->error("✗ View rendering failed: " . $e->getMessage());
        }
    }
}