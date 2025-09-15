<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SkoringModel;

class SkoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skoringData = [
            [
                'operator' => 'Operator A',
                'harga_satuan' => 25000000,
                'kategori' => 1,
                'umur_ekonomis' => 5,
                'jenis_barang' => 1,
                'sifat_barang' => 1,
                'keterangan' => 'Barang Merupakan Kategori Belanja Modal',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'operator' => 'Operator B',
                'harga_satuan' => 25000000,
                'kategori' => 1,
                'umur_ekonomis' => 3,
                'jenis_barang' => 2,
                'sifat_barang' => 1,
                'keterangan' => 'Barang dengan Kategori Belanja Modal tidak dapat di stok',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'operator' => 'Operator C',
                'harga_satuan' => 1000000,
                'kategori' => 2,
                'umur_ekonomis' => 1,
                'jenis_barang' => 3,
                'sifat_barang' => 2,
                'keterangan' => 'Barang Merupakan Kategori Belanja Barang',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'operator' => 'Operator D',
                'harga_satuan' => 500000,
                'kategori' => 2,
                'umur_ekonomis' => 1,
                'jenis_barang' => 4,
                'sifat_barang' => 2,
                'keterangan' => 'Barang Merupakan Kategori Belanja Barang Persediaan',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'operator' => 'Operator E',
                'harga_satuan' => 15000000,
                'kategori' => 1,
                'umur_ekonomis' => 7,
                'jenis_barang' => 5,
                'sifat_barang' => 1,
                'keterangan' => 'Barang Merupakan Kategori Belanja Modal',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'operator' => 'Operator F',
                'harga_satuan' => 25000000,
                'kategori' => 1,
                'umur_ekonomis' => 4,
                'jenis_barang' => 6,
                'sifat_barang' => 1,
                'keterangan' => 'Barang Merupakan Kategori Belanja Modal',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'operator' => 'Operator G',
                'harga_satuan' => 2000000,
                'kategori' => 2,
                'umur_ekonomis' => 2,
                'jenis_barang' => 7,
                'sifat_barang' => 2,
                'keterangan' => 'Barang Merupakan Kategori Belanja Barang',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'operator' => 'Operator H',
                'harga_satuan' => 3000000,
                'kategori' => 2,
                'umur_ekonomis' => 1,
                'jenis_barang' => 8,
                'sifat_barang' => 2,
                'keterangan' => 'Barang Merupakan Kategori Belanja Barang Persediaan',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'operator' => 'Operator I',
                'harga_satuan' => 50000000,
                'kategori' => 1,
                'umur_ekonomis' => 10,
                'jenis_barang' => 9,
                'sifat_barang' => 1,
                'keterangan' => 'Barang Merupakan Kategori Belanja Modal',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
            [
                'operator' => 'Operator J',
                'harga_satuan' => 750000,
                'kategori' => 2,
                'umur_ekonomis' => 1,
                'jenis_barang' => 10,
                'sifat_barang' => 2,
                'keterangan' => 'Barang Merupakan Kategori Belanja Barang Persediaan',
                'status' => 1,
                'user_input' => 'System',
                'tanggal_input' => now(),
            ],
        ];

        foreach ($skoringData as $data) {
            SkoringModel::create($data);
        }
    }
}