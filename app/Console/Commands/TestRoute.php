<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestRoute extends Command
{
    protected $signature = 'test:route';
    protected $description = 'Test route generation';

    public function handle()
    {
        try {
            $this->info('Testing route generation...');
            
            $route = route('admin.arsip_perencanaan.update', 1);
            $this->info('Update route: ' . $route);
            
            $editRoute = route('admin.arsip_perencanaan.edit', 1);
            $this->info('Edit route: ' . $editRoute);
            
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }
    }
}