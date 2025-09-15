<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InformasiModel;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Biaya Yang Diperlukan',
                'keterangan' => 'Diisi dengan total anggaran yang dibutuhkan untuk pencapaian keluaran dan penjelasan bahwa rincian biaya sesuai dengan RAB terlampir (dapat di lihat di DIPA/RAB/POK masing-masing unit kerja)',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Dasar Hukum',
                'keterangan' => 'Diisi dengan dasar hukum tugas fungsi dan/atau ketentuan yang terkait langsung dengan keluaran (output) yang akan dilaksanakan',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Gambaran Umum',
                'keterangan' => 'Diisi dengan gambaran umum mengenai keluaran (output) dan volumennya yang akan dilaksanakan dan dicapai',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Indikator Kinerja Kegiatan',
                'keterangan' => 'Diisi Indikator Kinerja Kegiatan pengisian Indikator ini mengacu pada PK level Eselon II',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Indikator Kinerja Program',
                'keterangan' => 'Diisi Indikator Kinerja Program, Pengisian Indikator ini mengacu pada PK level Eselon I',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Indikator KRO',
                'keterangan' => 'Diisi Indikator KRO, Pengisian Indikator ini mengacu pada PK level Eselon I',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Indikator RO',
                'keterangan' => 'Diisi Indikator RO, Pengisian Indikator ini mengacu pada PK level Eselon I',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Klasifikasi Rincian Output',
                'keterangan' => 'Diisi dengan klasifikasi rincian output yang akan dicapai',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Kurun Waktu Pencapaian Keluaran',
                'keterangan' => 'Diisi dengan kurun waktu pencapaian keluaran yang akan dilaksanakan',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Latar belakang',
                'keterangan' => 'Diisi dengan latar belakang mengapa keluaran (output) tersebut perlu dilaksanakan',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Metode Pelaksanaan',
                'keterangan' => 'Diisi dengan metode pelaksanaan keluaran (output) yang akan dilaksanakan',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Penerima Manfaat',
                'keterangan' => 'Diisi dengan penerima manfaat dari keluaran (output) yang akan dilaksanakan',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Rincian Output',
                'keterangan' => 'Diisi dengan rincian output yang akan dicapai',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Sasaran Kegiatan',
                'keterangan' => 'Diisi dengan sasaran kegiatan yang akan dicapai',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Sasaran Program',
                'keterangan' => 'Diisi dengan sasaran program yang akan dicapai',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Satuan RO',
                'keterangan' => 'Diisi dengan satuan RO yang akan dicapai',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Tahapan dan Waktu Pelaksanaan',
                'keterangan' => 'Diisi dengan tahapan dan waktu pelaksanaan keluaran (output) yang akan dilaksanakan',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'judul' => 'Volume RO',
                'keterangan' => 'Diisi dengan volume RO yang akan dicapai',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
        ];

        foreach ($data as $item) {
            InformasiModel::create($item);
        }
    }
}