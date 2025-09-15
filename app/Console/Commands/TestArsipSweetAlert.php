<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ArsipPerencanaanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TestArsipSweetAlert extends Command
{
    protected $signature = 'test:arsip-sweetalert';
    protected $description = 'Test arsip perencanaan SweetAlert';

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
        
        $this->info("Testing SweetAlert for arsip ID: {$arsip->id}");
        
        // Test session flash messages
        Session::flash('success', 'Arsip Perencanaan berhasil diperbarui!');
        
        if (Session::has('success')) {
            $this->info("✓ Success message set: " . Session::get('success'));
        } else {
            $this->error("✗ No success message in session");
        }
        
        // Test view rendering with session
        try {
            $view = view('admin.arsip_perencanaan.edit', [
                'arsipPerencanaan' => $arsip,
                'errors' => new \Illuminate\Support\MessageBag()
            ]);
            $html = $view->render();
            
            if (strpos($html, 'Swal.fire') !== false) {
                $this->info("✓ SweetAlert found in view");
            } else {
                $this->error("✗ SweetAlert not found in view");
            }
            
            if (strpos($html, 'Berhasil!') !== false) {
                $this->info("✓ Success message found in view");
            } else {
                $this->error("✗ Success message not found in view");
            }
            
        } catch (\Exception $e) {
            $this->error("✗ View rendering error: " . $e->getMessage());
        }
    }
}
