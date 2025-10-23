<?php

namespace App\Services;

use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PosterService
{
    public function getAllActive()
    {
        return Poster::where('status', 1)->orderByDesc('tanggal_input')->get();
    }

    public function getById($id)
    {
        return Poster::where('id', $id)->where('status', 1)->firstOrFail();
    }

    public function validateData(Request $request, $isUpdate = false)
    {
        $rules = [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => $isUpdate ? 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048' : 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status_publikasi' => 'nullable|boolean',
        ];

        return $request->validate($rules);
    }

    public function createPoster(array $data, $file)
    {
        $path = $file->store('posters', 'public');
        return Poster::create([
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'file_name' => $path,
            'file_type' => $file->getClientOriginalExtension(),
            'file_size' => $file->getSize(),
            'status_publikasi' => $data['status_publikasi'] ?? 0,
        ]);
    }

    public function updatePoster($id, array $data, $file = null)
    {
        $poster = Poster::findOrFail($id);

        if ($file) {
            // hapus file lama
            if ($poster->file_name && Storage::disk('public')->exists($poster->file_name)) {
                Storage::disk('public')->delete($poster->file_name);
            }
            $path = $file->store('posters', 'public');
            $poster->update([
                'file_name' => $path,
                'file_type' => $file->getClientOriginalExtension(),
                'file_size' => $file->getSize(),
            ]);
        }

        $poster->update([
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'status_publikasi' => $data['status_publikasi'] ?? 0,
        ]);

        return $poster;
    }

    public function softDelete($id)
    {
        $poster = Poster::findOrFail($id);
        $poster->update([
            'status' => 9,
        ]);
        return $poster;
    }
}
