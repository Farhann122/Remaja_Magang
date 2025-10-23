<?php

namespace App\Services;

use App\Models\AlbumFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumFotoService
{
    public function getAllActive()
    {
        return AlbumFoto::where('status', 1)
            ->orderBy('tanggal_input', 'desc')
            ->get();
    }

    public function getById($id)
    {
        return AlbumFoto::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function validateAlbumFotoData(Request $request)
    {
        return $request->validate([
            'tanggal' => 'required|date',
            'album_foto' => 'required|string|max:255',
        ], [
            'tanggal.required' => 'Tanggal harus diisi.',
            'album_foto.required' => 'Nama album foto harus diisi.',
        ]);
    }

    public function createAlbumFoto(array $data)
    {
        return AlbumFoto::create([
            'tanggal'        => $data['tanggal'],
            'album_foto'     => $data['album_foto'],
            'status'         => 1,
            'user_input'     => Auth::check() ? Auth::user()->username : 'system',
            'tanggal_input'  => now(),
        ]);
    }

    public function updateAlbumFoto($id, array $data)
    {
        $album = AlbumFoto::findOrFail($id);
        $album->update([
            'tanggal'        => $data['tanggal'],
            'album_foto'     => $data['album_foto'],
            'user_update'    => Auth::check() ? Auth::user()->username : 'system',
            'tanggal_update' => now(),
        ]);
        return $album;
    }

    public function softDeleteAlbumFoto($id)
    {
        $album = AlbumFoto::findOrFail($id);
        $album->update([
            'status'         => 9,
            'user_update'    => Auth::check() ? Auth::user()->username : 'system',
            'tanggal_update' => now(),
        ]);
        return $album;
    }
}
