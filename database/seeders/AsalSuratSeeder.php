<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsalSuratModel;

class AsalSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['asal_surat' => 'Kementerian Keuangan'],
            ['asal_surat' => 'Bappenas'],
            ['asal_surat' => 'Presiden'],
            ['asal_surat' => 'Kementerian Kesehatan'],
            ['asal_surat' => 'Kementerian Pendidikan dan Kebudayaan'],
            ['asal_surat' => 'Kementerian Dalam Negeri'],
            ['asal_surat' => 'Kementerian Luar Negeri'],
            ['asal_surat' => 'Kementerian Pertahanan'],
            ['asal_surat' => 'Kementerian Hukum dan HAM'],
            ['asal_surat' => 'Kementerian Sosial'],
            ['asal_surat' => 'Kementerian Tenaga Kerja'],
            ['asal_surat' => 'Kementerian Perindustrian'],
            ['asal_surat' => 'Kementerian Perdagangan'],
            ['asal_surat' => 'Kementerian Pertanian'],
            ['asal_surat' => 'Kementerian Kelautan dan Perikanan'],
            ['asal_surat' => 'Kementerian Energi dan Sumber Daya Mineral'],
            ['asal_surat' => 'Kementerian Pekerjaan Umum dan Perumahan Rakyat'],
            ['asal_surat' => 'Kementerian Perhubungan'],
            ['asal_surat' => 'Kementerian Komunikasi dan Informatika'],
            ['asal_surat' => 'Kementerian Lingkungan Hidup dan Kehutanan'],
        ];

        foreach ($data as $item) {
            AsalSuratModel::create([
                'asal_surat' => $item['asal_surat'],
                'status' => 1,
                'user_input' => 'admin',
                'tanggal_input' => now()
            ]);
        }
    }
}
