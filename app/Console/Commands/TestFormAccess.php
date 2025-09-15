<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ArsipPerencanaanModel;

class TestFormAccess extends Command
{
    protected $signature = 'test:form-access';
    protected $description = 'Test form access and data';

    public function handle()
    {
        try {
            $this->info('Testing form access...');
            
            // Get first arsip
            $arsip = ArsipPerencanaanModel::first();
            if (!$arsip) {
                $this->error('No arsip found');
                return;
            }
            
            $this->info('Found arsip: ' . $arsip->judul);
            $this->info('Arsip ID: ' . $arsip->id);
            $this->info('Tahun: ' . $arsip->tahun);
            
            // Test route generation
            $editRoute = route('admin.arsip_perencanaan.edit', $arsip->id);
            $this->info('Edit route: ' . $editRoute);
            
            $updateRoute = route('admin.arsip_perencanaan.update', $arsip->id);
            $this->info('Update route: ' . $updateRoute);
            
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }
    }
}