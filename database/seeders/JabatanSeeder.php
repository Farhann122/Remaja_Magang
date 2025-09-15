<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JabatanModel;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatanData = [
            [
                'jabatan' => 'Perencanaan',
                'peran' => 'Tim perencanaan',
                'status' => 1,
                'user_input' => 'system',
                'tanggal_input' => now(),
            ],
            [
                'jabatan' => 'Staf PPK',
                'peran' => 'Staf Pejabat Pembuat Komitmen',
                'status' => 1,
                'user_input' => 'system',
                'tanggal_input' => now(),
            ],
            [
                'jabatan' => 'Penanggung Jawab Kegiatan/PPK',
                'peran' => 'Penanggung jawab kegiatan dan PPK',
                'status' => 1,
                'user_input' => 'system',
                'tanggal_input' => now(),
            ],
            [
                'jabatan' => 'Staf Unit Kerja',
                'peran' => 'Staf unit kerja',
                'status' => 1,
                'user_input' => 'system',
                'tanggal_input' => now(),
            ],
            [
                'jabatan' => 'EYANG SINCAN :)',
                'peran' => 'Jabatan khusus untuk Eyang Sincan',
                'status' => 1,
                'user_input' => 'system',
                'tanggal_input' => now(),
            ],
            [
                'jabatan' => 'Auditor',
                'peran' => 'Auditor',
                'status' => 1,
                'user_input' => 'system',
                'tanggal_input' => now(),
            ],
        ];

        foreach ($jabatanData as $data) {
            JabatanModel::create($data);
        }
    }
}