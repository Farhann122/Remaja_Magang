<?php

namespace App\Services;

use App\Models\PartisipasiModel;
use Illuminate\Http\Request;

class PartisipasiService
{
    public function getAllActive()
    {
        return PartisipasiModel::where('status', 1)
            ->orderBy('tanggal_input', 'desc')
            ->get();
    }

    public function getById($id)
    {
        return PartisipasiModel::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function validatePartisipasiData(Request $request)
    {
        return $request->validate([
            'partisipasi' => 'required|string|max:255'
        ], [
            'partisipasi.required' => 'Nama partisipasi harus diisi',
            'partisipasi.string' => 'Partisipasi harus berupa teks',
            'partisipasi.max' => 'Maksimal 255 karakter',
        ]);
    }

    public function createPartisipasi(array $data)
    {
        return PartisipasiModel::create($data);
    }

    public function update($id, array $data)
    {
        $partisipasi = PartisipasiModel::findOrFail($id);
        $partisipasi->update($data);
        return $partisipasi;
    }

    public function softDelete($id)
    {
        $partisipasi = PartisipasiModel::findOrFail($id);
        $partisipasi->update(['status' => 9]);
        return $partisipasi;
    }
}
