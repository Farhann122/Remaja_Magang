<?php

namespace App\Services;

use App\Models\SkoringCv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkoringCvService
{
    public function getAllActive()
    {
        return SkoringCv::with(['kegiatan', 'tingkat', 'partisipasi'])
            ->where('status', 1)
            ->orderByDesc('tanggal_input')
            ->get();
    }

    public function getById($id)
    {
        return SkoringCv::with(['kegiatan', 'tingkat', 'partisipasi'])->findOrFail($id);
    }

    public function validateData(Request $request)
    {
        return $request->validate([
            'id_kegiatan' => 'required|integer',
            'id_tingkat' => 'required|integer',
            'id_partisipasi' => 'required|integer',
            'deskripsi' => 'required|string|max:255',
            'skor' => 'required|numeric',
        ]);
    }

    public function create(array $data)
    {
        $data['status'] = 1;
        $data['user_input'] = Auth::user()->username ?? 'system';
        $data['tanggal_input'] = now();

        return SkoringCv::create($data);
    }

    public function update($id, array $data)
    {
        $record = SkoringCv::findOrFail($id);
        $data['user_update'] = Auth::user()->username ?? 'system';
        $data['tanggal_update'] = now();
        $record->update($data);
    }

    public function softDelete($id)
    {
        $record = SkoringCv::findOrFail($id);
        $record->update(['status' => 0]);
    }
}
