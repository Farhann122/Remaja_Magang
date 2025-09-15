<?php

namespace App\Services;

use App\Models\InformasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformasiService
{
    public function getAllActiveInformasi()
    {
        return InformasiModel::where('status', 1)
            ->orderBy('id', 'asc')
            ->get();
    }

    public function getInformasiById($id)
    {
        return InformasiModel::findOrFail($id);
    }

    public function validateInformasiData(Request $request)
    {
        return $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ], [
            'judul.required' => 'Judul harus diisi',
            'judul.string' => 'Judul harus berupa teks',
            'judul.max' => 'Judul maksimal 255 karakter',
            'keterangan.required' => 'Keterangan harus diisi',
            'keterangan.string' => 'Keterangan harus berupa teks',
        ]);
    }

    public function createInformasi(array $data)
    {
        return InformasiModel::create($data);
    }

    public function updateInformasi($id, array $data)
    {
        $informasi = InformasiModel::findOrFail($id);
        $informasi->update($data);
        return $informasi;
    }

    public function deleteInformasi($id)
    {
        $informasi = InformasiModel::findOrFail($id);
        $informasi->update(['status' => 9]);
        return $informasi;
    }
}
