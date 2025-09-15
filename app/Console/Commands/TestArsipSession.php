<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\ArsipPerencanaanModel;
use App\Http\Controllers\ArsipPerencanaanController;
use App\Services\ArsipPerencanaanService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TestArsipSession extends Command
{
    protected $signature = 'test:arsip-session';
    protected $description = 'Test arsip perencanaan session and flash messages';

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
        
        $this->info("Testing session for arsip ID: {$arsip->id}");
        
        // Test controller update with session
        try {
            $service = new ArsipPerencanaanService();
            $controller = new ArsipPerencanaanController($service);
            
            // Create mock request
            $request = new Request();
            $request->merge([
                'tahun' => 2025,
                'judul' => 'Test Session Update - ' . now()->format('H:i:s'),
                '_token' => csrf_token()
            ]);
            $request->setMethod('PUT');
            
            $response = $controller->update($request, $arsip->id);
            
            $this->info("✓ Controller update successful");
            
            // Check session data
            $sessionData = Session::all();
            $this->info("Session keys: " . implode(', ', array_keys($sessionData)));
            
            if (Session::has('success')) {
                $this->info("✓ Success message: " . Session::get('success'));
            } else {
                $this->error("✗ No success message in session");
            }
            
            if (Session::has('error')) {
                $this->error("✗ Error message: " . Session::get('error'));
            }
            
        } catch (\Exception $e) {
            $this->error("✗ Controller update error: " . $e->getMessage());
        }
    }
}
