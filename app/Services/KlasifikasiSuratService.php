<?php

namespace App\Services;

use App\Models\KlasifikasiSuratModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KlasifikasiSuratService
{
    public function getAllActiveKlasifikasiSurat()
    {
        return KlasifikasiSuratModel::where('status', 1)
            ->orderBy('id', 'asc')
            ->get();
    }

    public function getKlasifikasiSuratById($id)
    {
        return KlasifikasiSuratModel::findOrFail($id);
    }

    public function validateKlasifikasiSuratData(Request $request)
    {
        return $request->validate([
            'klasifikasi_surat' => 'required|string|max:100',
        ], [
            'klasifikasi_surat.required' => 'Klasifikasi Surat harus diisi',
            'klasifikasi_surat.string' => 'Klasifikasi Surat harus berupa teks',
            'klasifikasi_surat.max' => 'Klasifikasi Surat maksimal 100 karakter',
        ]);
    }

    public function createKlasifikasiSurat(array $data)
    {
        return KlasifikasiSuratModel::create($data);
    }

    public function updateKlasifikasiSurat($id, array $data)
    {
        $klasifikasiSurat = KlasifikasiSuratModel::findOrFail($id);
        $klasifikasiSurat->update($data);
        return $klasifikasiSurat;
    }

    public function deleteKlasifikasiSurat($id)
    {
        $klasifikasiSurat = KlasifikasiSuratModel::findOrFail($id);
        $klasifikasiSurat->update(['status' => 9]);
        return $klasifikasiSurat;
    }
}
