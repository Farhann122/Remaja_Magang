<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ArsipPerencanaanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class TestArsipEditView extends Command
{
    protected $signature = 'test:arsip-edit-view {id}';
    protected $description = 'Test arsip edit view rendering';

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
            
            // Check if upload section exists
            if (strpos($html, 'id="upload-section"') !== false) {
                $this->info("✓ Upload section found in HTML");
            } else {
                $this->error("✗ Upload section NOT found in HTML");
            }
            
            // Check if file display exists
            if (strpos($html, 'class="file-display"') !== false) {
                $this->info("✓ File display found in HTML");
            } else {
                $this->error("✗ File display NOT found in HTML");
                
                // Check if file_name condition is met
                if (!empty($arsipPerencanaan->file_name)) {
                    $this->error("File name is not empty: '{$arsipPerencanaan->file_name}'");
                    $this->error("This should trigger @if condition");
                } else {
                    $this->info("File name is empty, @if condition not met");
                }
            }
            
            // Check JavaScript
            if (strpos($html, 'getElementById(\'upload-section\')') !== false) {
                $this->info("✓ JavaScript for upload section found");
            } else {
                $this->error("✗ JavaScript for upload section NOT found");
            }
            
        } catch (\Exception $e) {
            $this->error("✗ View rendering failed: " . $e->getMessage());
        }
    }
}
