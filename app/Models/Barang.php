<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public static $umurEkonomis = [
        1 => "≤1",
        2 => ">1"
    ];

    public static $jenisBarang = [
        1 => "Komponen Utama",
        2 => "Komponen",
        3 => "Komponen Pendukung/Suku Cadang"
    ];

    public static $sifatBarang = [
        0 => "Tidak",
        1 => "Habis Pakai"
    ];

    public static $keterangan = [
        1 => "Barang Merupakan Kategori Belanja Modal",
        2 => "Barang Merupakan Kategori Belanja Barang Stroring",
        3 => "Barang Merupakan Kategori Belanja Barang Persediaan",
        4 => "Barang dengan Kategori Belanja Modal tidak dapat di stok",
    ];
}
