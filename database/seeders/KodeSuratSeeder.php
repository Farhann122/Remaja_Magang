<?php

namespace Database\Seeders;

use App\Models\KodeSuratModel;
use Illuminate\Database\Seeder;

class KodeSuratSeeder extends Seeder
{
    public function run(): void
    {
        $kodeSuratData = [
            ['kode_surat' => 'KU.06.06.06', 'keterangan' => 'REVISI ANGGARAN', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.02.01', 'keterangan' => 'Usulan Perencanaan Kegiatan Unit Kerja', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.01.01', 'keterangan' => 'Rencana Strategis (Renstra)', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.01.02', 'keterangan' => 'Rencana Pembangunan Jangka Panjang (RPJP)', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.01.03', 'keterangan' => 'Rencana Pembangunan Jangka Menengah (RPJM)', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.01.04', 'keterangan' => 'Pengelolaan Sistem Akuntabilitas Kinerja Instansi Pemerintah (SAKIP)', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.02.02', 'keterangan' => 'Program Kerja Tahunan Unit Kerja', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.02.03', 'keterangan' => 'Program Kerja Tahunan Setjen DPR RI', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.03', 'keterangan' => 'Penyusunan RAPBN', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.04.01', 'keterangan' => 'Penetapan Kontrak Kinerja Sekjen DPR RI', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.04.02', 'keterangan' => 'Penetapan Kontrak Kinerja Pimpinan Unit Kerja', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.05.01', 'keterangan' => 'Laporan Khusus', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.05.02', 'keterangan' => 'Laporan Berkala', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.05.03', 'keterangan' => 'Laporan Tahunan DPR RI', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.05.04', 'keterangan' => 'Laporan Akuntabilitas Kinerja Instansi Pemerintahan (LAKIP)', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.07.01', 'keterangan' => 'Monitoring dan Evaluasi Unit Kerja', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.07.02', 'keterangan' => 'Monitoring dan Evaluasi DPR RI', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => 'PR.08.01', 'keterangan' => 'Lain-lain', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
            ['kode_surat' => '0.0', 'keterangan' => 'blank', 'status' => 1, 'user_input' => 'system', 'tanggal_input' => now()],
        ];

        foreach ($kodeSuratData as $data) {
            KodeSuratModel::create($data);
        }
    }
}