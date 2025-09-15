<?php

namespace App\Services;

use App\Models\SkoringModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkoringService
{
    public function getAllActiveSkoring()
    {
        return SkoringModel::where('status', 1)->get();
    }

    public function getSkoringById($id)
    {
        return SkoringModel::findOrFail($id);
    }

    public function validateSkoringData(Request $request)
    {
        return $request->validate([
            'operator' => 'required|in:<,<=,=,>=,>',
            'harga_satuan' => 'required|numeric|min:0',
            'kategori' => 'required|integer',
            'umur_ekonomis' => 'required|integer',
            'jenis_barang' => 'required|integer',
            'sifat_barang' => 'required|integer',
            'keterangan' => 'required|string|max:100',
        ], [
            'operator.required' => 'Operator harus diisi',
            'operator.in' => 'Operator harus salah satu dari: <, <=, =, >=, >',
            'harga_satuan.required' => 'Harga Satuan harus diisi',
            'harga_satuan.numeric' => 'Harga Satuan harus berupa angka',
            'harga_satuan.min' => 'Harga Satuan tidak boleh kurang dari 0',
            'kategori.required' => 'Kategori harus diisi',
            'kategori.integer' => 'Kategori harus berupa angka',
            'umur_ekonomis.required' => 'Umur Ekonomis harus diisi',
            'umur_ekonomis.integer' => 'Umur Ekonomis harus berupa angka',
            'jenis_barang.required' => 'Jenis Barang harus diisi',
            'jenis_barang.integer' => 'Jenis Barang harus berupa angka',
            'sifat_barang.required' => 'Sifat Barang harus diisi',
            'sifat_barang.integer' => 'Sifat Barang harus berupa angka',
            'keterangan.required' => 'Keterangan harus diisi',
        ]);
    }

    public function createSkoring(array $data)
    {
        return SkoringModel::create($data);
    }

    public function updateSkoring($id, array $data)
    {
        $skoring = SkoringModel::findOrFail($id);
        $skoring->update($data);
        return $skoring;
    }

    public function deleteSkoring($id)
    {
        $skoring = SkoringModel::findOrFail($id);
        $skoring->update(['status' => 9]);
        return $skoring;
    }
}
