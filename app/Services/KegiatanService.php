<?php

namespace App\Services;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanService
{
    public function getAllActive()
    {
        return Kegiatan::where('status', 1)
            ->orderByDesc('tanggal_input')
            ->get();
    }

    public function getById($id)
    {
        return Kegiatan::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

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

    public function createKegiatan(array $data)
    {
        return Kegiatan::create([
            'kegiatan'       => $data['kegiatan'],
            'status'         => 1,
            // ⛔ Jangan isi tanggal_input di sini, biarkan Model yang handle
            'user_input'     => Auth::check() ? Auth::user()->username : 'system',
        ]);
    }

    public function updateKegiatan($id, array $data)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update([
            'kegiatan' => $data['kegiatan'],
        ]);

        return $kegiatan;
    }

    public function softDeleteKegiatan($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update([
            'status' => 9,
        ]);

        return $kegiatan;
    }
}
