<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ArsipPerencanaanModel;
use App\Http\Controllers\ArsipPerencanaanController;
use App\Services\ArsipPerencanaanService;
use Illuminate\Support\Facades\Auth;

class TestArsipEditAccess extends Command
{
    protected $signature = 'test:arsip-edit-access';
    protected $description = 'Test arsip perencanaan edit access';

    public function handle()
    {
        // Login user
        $user = User::where('email', 'test@example.com')->first();
        Auth::login($user);
        
        $this->info("Logged in as: " . Auth::user()->name);
        
        // Get first arsip
        $arsip = ArsipPerencanaanModel::where('status', '!=', 9)->first();
        
        if (!$arsip) {
            $this->error("No arsip found");
            return;
        }
        
        $this->info("Testing edit access for arsip ID: {$arsip->id}");
        
        // Test controller edit method
        try {
            $service = new ArsipPerencanaanService();
            $controller = new ArsipPerencanaanController($service);
            
            $response = $controller->edit($arsip->id);
            
            $this->info("✓ Edit controller works");
            $this->info("Response type: " . get_class($response));
            
            // Test view rendering
            $data = $response->getData();
            if (isset($data['arsipPerencanaan'])) {
                $this->info("✓ Arsip data found in view");
                $this->info("Arsip judul: " . $data['arsipPerencanaan']->judul);
            } else {
                $this->error("✗ No arsip data in view");
            }
            
        } catch (\Exception $e) {
            $this->error("✗ Edit controller error: " . $e->getMessage());
        }
        
        // Test form action URL generation
        try {
            $editUrl = route('admin.arsip_perencanaan.edit', $arsip->id);
            $updateUrl = route('admin.arsip_perencanaan.update', $arsip->id);
            
            $this->info("✓ Edit URL: " . $editUrl);
            $this->info("✓ Update URL: " . $updateUrl);
            
        } catch (\Exception $e) {
            $this->error("✗ URL generation error: " . $e->getMessage());
        }
    }
}
