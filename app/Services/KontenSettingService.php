<?php

namespace App\Services;

use App\Models\KontenSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KontenSettingService
{
    /**
     * Ambil semua setting yang aktif
     */
    public function getAllActive()
    {
        return KontenSetting::where('status', 1)
            ->orderBy('tanggal_input', 'desc')
            ->get();
    }

    /**
     * Ambil data berdasarkan ID
     */
    public function getById($id)
    {
        return KontenSetting::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

    /**
     * Validasi input
     */
    public function validateData(Request $request)
    {
        return $request->validate([
            'nama'  => 'required|string|max:255',
            'nilai' => 'nullable|string',
            'tipe'  => 'required|string|max:100',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.string'   => 'Nama harus berupa teks.',
            'nama.max'      => 'Nama maksimal 255 karakter.',
            'tipe.required' => 'Tipe harus diisi.',
        ]);
    }

    /**
     * Simpan data baru
     */
    public function create(array $data)
    {
        return KontenSetting::create([
            'nama'          => $data['nama'],
            'nilai'         => $data['nilai'] ?? null,
            'tipe'          => $data['tipe'],
            'status'        => 1,
            'user_input'    => Auth::check() ? Auth::user()->username : 'system',
            'tanggal_input' => now(),
        ]);
    }

    /**
     * Update data
     */
    public function update($id, array $data)
    {
        $setting = KontenSetting::findOrFail($id);
        $setting->update([
            'nama'          => $data['nama'],
            'nilai'         => $data['nilai'] ?? null,
            'tipe'          => $data['tipe'],
            'user_update'   => Auth::check() ? Auth::user()->username : 'system',
            'tanggal_update'=> now(),
        ]);

        return $setting;
    }

    /**
     * Soft delete
     */
    public function softDelete($id)
    {
        $setting = KontenSetting::findOrFail($id);
        $setting->update([
            'status'         => 9,
            'user_update'    => Auth::check() ? Auth::user()->username : 'system',
            'tanggal_update' => now(),
        ]);

        return $setting;
    }
}
