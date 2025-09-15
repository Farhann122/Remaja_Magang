<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ArsipPerencanaanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TestArsipFull extends Command
{
    protected $signature = 'test:arsip-full';
    protected $description = 'Test full arsip perencanaan flow';

    public function handle()
    {
        // Login user
        $user = User::where('email', 'test@example.com')->first();
        Auth::login($user);
        
        $this->info("Logged in as: " . Auth::user()->name);
        
        // Test index
        $arsipPerencanaan = ArsipPerencanaanModel::where('status', '!=', 9)->orderBy('tahun', 'desc')->get();
        $this->info("Arsip count: " . $arsipPerencanaan->count());
        
        // Test create
        $this->info("Testing create view...");
        try {
            $view = view('admin.arsip_perencanaan.create', ['errors' => new \Illuminate\Support\MessageBag()]);
            $html = $view->render();
            $this->info("✓ Create view OK");
        } catch (\Exception $e) {
            $this->error("✗ Create view error: " . $e->getMessage());
        }
        
        // Test edit
        if ($arsipPerencanaan->count() > 0) {
            $arsip = $arsipPerencanaan->first();
            $this->info("Testing edit view for ID: " . $arsip->id);
            try {
                $view = view('admin.arsip_perencanaan.edit', [
                    'arsipPerencanaan' => $arsip,
                    'errors' => new \Illuminate\Support\MessageBag()
                ]);
                $html = $view->render();
                $this->info("✓ Edit view OK");
            } catch (\Exception $e) {
                $this->error("✗ Edit view error: " . $e->getMessage());
            }
        }
        
        $this->info("All tests completed!");
    }
}
