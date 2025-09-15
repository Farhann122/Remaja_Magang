<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SatuanModel;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data first
        SatuanModel::truncate();
        
        $satuans = [
            ['kode_satuan' => '$', 'nama_satuan' => 'Us dollar'],
            ['kode_satuan' => '%', 'nama_satuan' => 'Persen'],
            ['kode_satuan' => 'AKD', 'nama_satuan' => 'Alat Kelengkapan Dewan'],
            ['kode_satuan' => 'Analisis', 'nama_satuan' => 'Analisis'],
            ['kode_satuan' => 'anggt', 'nama_satuan' => 'Anggota'],
            ['kode_satuan' => 'angkt', 'nama_satuan' => 'Angkatan'],
            ['kode_satuan' => 'AUD', 'nama_satuan' => 'Australia dollar'],
            ['kode_satuan' => 'bag', 'nama_satuan' => 'Bagian'],
            ['kode_satuan' => 'bdn', 'nama_satuan' => 'Badan'],
            ['kode_satuan' => 'beta', 'nama_satuan' => 'Betacam'],
            ['kode_satuan' => 'bh', 'nama_satuan' => 'Buah'],
            ['kode_satuan' => 'bid', 'nama_satuan' => 'Bidang'],
            ['kode_satuan' => 'biro', 'nama_satuan' => 'Biro'],
            ['kode_satuan' => 'bk', 'nama_satuan' => 'Buku'],
            ['kode_satuan' => 'bln', 'nama_satuan' => 'Bulan'],
            ['kode_satuan' => 'box', 'nama_satuan' => 'Box'],
            ['kode_satuan' => 'bus', 'nama_satuan' => 'Bus'],
            ['kode_satuan' => 'cab', 'nama_satuan' => 'Cabang'],
            ['kode_satuan' => 'delegasi', 'nama_satuan' => 'Delegasi'],
            ['kode_satuan' => 'deputi', 'nama_satuan' => 'Deputi'],
        ];

        foreach ($satuans as $satuan) {
            SatuanModel::create($satuan);
        }
    }
}