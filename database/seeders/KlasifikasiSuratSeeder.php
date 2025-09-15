<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KlasifikasiSuratModel;

class KlasifikasiSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Revisi Satker Setjen',
            'Revisi Satker Dewan',
            'Refocusing',
            'RKA Usulan',
            'Pagu Anggaran',
            'Pagu Indikatif',
            'Alokasi Anggaran',
            'DIPA',
            'Koreksi MA',
            'IZIN PRINSIP',
            'MONEV',
            'Perjanijian Kinerja',
            'SAKIP',
            'TOR',
            'RKA K/L',
            'Lain-lain',
            'ABT'
        ];

        foreach ($data as $klasifikasi) {
            KlasifikasiSuratModel::create([
                'klasifikasi_surat' => $klasifikasi,
                'status' => 1,
                'user_input' => 'admin',
                'tanggal_input' => now()
            ]);
        }
    }
}

