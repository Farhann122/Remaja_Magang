<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ArsipPerencanaanModel;
use App\Services\ArsipPerencanaanService;
use Illuminate\Support\Facades\Auth;

class TestArsipUpdate extends Command
{
    protected $signature = 'test:arsip-update';
    protected $description = 'Test arsip perencanaan update';

    public function handle()
    {
        // Login user
        $user = User::where('email', 'test@example.com')->first();
        Auth::login($user);
        
        // Get first arsip
        $arsip = ArsipPerencanaanModel::where('status', '!=', 9)->first();
        
        if (!$arsip) {
            $this->error("No arsip found");
            return;
        }
        
        $this->info("Testing update for arsip ID: {$arsip->id}");
        $this->info("Current judul: {$arsip->judul}");
        
        // Test service update
        try {
            $service = new ArsipPerencanaanService();
            $data = [
                'tahun' => $arsip->tahun,
                'judul' => 'Updated via Command - ' . now()->format('H:i:s'),
                'user_update' => 'admin',
                'tanggal_update' => now()
            ];
            
            $updated = $service->updateArsipPerencanaan($arsip->id, $data);
            $this->info("✓ Service update successful");
            $this->info("New judul: {$updated->judul}");
            
        } catch (\Exception $e) {
            $this->error("✗ Service update error: " . $e->getMessage());
        }
    }
}