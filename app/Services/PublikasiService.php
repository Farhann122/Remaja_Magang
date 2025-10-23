<?php

namespace App\Services;

use App\Models\Publikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublikasiService
{
    public function getAllActive()
    {
        return Publikasi::where('status', 1)
            ->orderBy('tanggal_input', 'desc')
            ->get();
    }

    public function getById($id)
    {
        return Publikasi::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function validatePublikasiData(Request $request)
    {
        return $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_publikasi_uri' => 'nullable|string|max:255',
            'cover_uri' => 'nullable|string|max:255',
            'status_publikasi' => 'nullable|integer'
        ]);
    }

    public function createPublikasi(array $data)
    {
        return Publikasi::create([
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'file_publikasi_uri' => $data['file_publikasi_uri'] ?? null,
            'cover_uri' => $data['cover_uri'] ?? null,
            'status_publikasi' => $data['status_publikasi'] ?? 0,
            'status' => 1,
            'user_input' => Auth::check() ? Auth::user()->username : 'system',
            'tanggal_input' => now(),
        ]);
    }

    public function updatePublikasi($id, array $data)
    {
        $publikasi = Publikasi::findOrFail($id);
        $publikasi->update([
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'file_publikasi_uri' => $data['file_publikasi_uri'] ?? null,
            'cover_uri' => $data['cover_uri'] ?? null,
            'status_publikasi' => $data['status_publikasi'] ?? 0,
            'user_update' => Auth::check() ? Auth::user()->username : 'system',
            'tanggal_update' => now(),
        ]);

        return $publikasi;
    }

    public function softDeletePublikasi($id)
    {
        $publikasi = Publikasi::findOrFail($id);
        $publikasi->update([
            'status' => 9,
            'user_update' => Auth::check() ? Auth::user()->username : 'system',
            'tanggal_update' => now(),
        ]);
    }
}
