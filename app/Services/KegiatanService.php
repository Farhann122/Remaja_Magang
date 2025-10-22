<?php

namespace App\Services;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KegiatanService
{
    /**
     * Ambil semua kegiatan yang aktif (status = 1)
     */
    public function getAllActive()
    {
        return Kegiatan::where('status', 1)
            ->orderBy('tanggal_input', 'desc')
            ->get();
    }

    /**
     * Ambil data kegiatan berdasarkan ID
     */
    public function getById($id)
    {
        return Kegiatan::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

    /**
     * Validasi input data kegiatan
     */
    public function validateKegiatanData(Request $request)
    {
        return $request->validate([
            'kegiatan' => 'required|string|max:255',
        ], [
            'kegiatan.required' => 'Nama kegiatan harus diisi.',
            'kegiatan.string'   => 'Nama kegiatan harus berupa teks.',
            'kegiatan.max'      => 'Nama kegiatan maksimal 255 karakter.',
        ]);
    }

    /**
     * Simpan kegiatan baru
     */
    public function createKegiatan(array $data)
    {
        return Kegiatan::create([
            'kegiatan'       => $data['kegiatan'],
            'status'         => 1,
            'user_input'     => Auth::check() ? Auth::user()->username : 'system',
            'tanggal_input'  => now(),
        ]);
    }

    /**
     * Update data kegiatan
     */
    public function updateKegiatan($id, array $data)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update([
            'kegiatan'       => $data['kegiatan'],
            'user_update'    => Auth::check() ? Auth::user()->username : 'system',
            'tanggal_update' => now(),
        ]);

        return $kegiatan;
    }

    /**
     * Soft delete kegiatan (ubah status jadi 9)
     */
    public function softDeleteKegiatan($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update([
            'status'         => 9,
            'user_update'    => Auth::check() ? Auth::user()->username : 'system',
            'tanggal_update' => now(),
        ]);

        return $kegiatan;
    }
}
