<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ArsipPerencanaanController;
use App\Services\ArsipPerencanaanService;

class TestArsipAccess extends Command
{
    protected $signature = 'test:arsip-access';
    protected $description = 'Test arsip perencanaan access';

    public function handle()
    {
        try {
            $service = new ArsipPerencanaanService();
            $controller = new ArsipPerencanaanController($service);
            
            $response = $controller->index();
            $this->info("Controller response type: " . get_class($response));
            
            $data = $response->getData();
            $this->info("View data keys: " . implode(', ', array_keys($data)));
            
            if (isset($data['arsipPerencanaan'])) {
                $this->info("Arsip count in view: " . count($data['arsipPerencanaan']));
            }
            
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }
    }
}
