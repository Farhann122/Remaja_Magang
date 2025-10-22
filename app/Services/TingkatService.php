<?php

namespace App\Services;

use App\Models\Tingkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TingkatService
{
    /**
     * Ambil semua data aktif
     */
    public function getAllActive()
    {
        return Tingkat::where('status', 1)
            ->orderBy('tanggal_input', 'desc')
            ->get();
    }

    /**
     * Ambil satu data berdasarkan ID
     */
    public function getById($id)
    {
        return Tingkat::findOrFail($id);
    }

    /**
     * Validasi input data tingkat
     */
    public function validateTingkatData(Request $request)
    {
        return $request->validate([
            'tingkat' => 'required|string|max:255',
        ]);
    }

    /**
     * Simpan data tingkat baru
     */
    public function createTingkat(array $data)
    {
        return Tingkat::create([
            'tingkat' => $data['tingkat'],
            'status' => 1,
            'user_input' => Auth::user()->name ?? 'system',
            'tanggal_input' => now(),
        ]);
    }

    /**
     * Update data tingkat
     */
    public function updateTingkat($id, array $data)
    {
        $tingkat = Tingkat::findOrFail($id);
        $tingkat->update([
            'tingkat' => $data['tingkat'],
            'user_update' => Auth::user()->name ?? 'system',
            'tanggal_update' => now(),
        ]);
        return $tingkat;
    }

    /**
     * Soft delete tingkat (ubah status jadi 9)
     */
    public function softDeleteTingkat($id)
    {
        $tingkat = Tingkat::findOrFail($id);
        $tingkat->update([
            'status' => 9,
            'user_update' => Auth::user()->name ?? 'system',
            'tanggal_update' => now(),
        ]);
    }
}
