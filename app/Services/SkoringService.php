<?php

namespace App\Services;

use App\Models\Skoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkoringService
{
    public function getAllActive()
    {
        return Skoring::where('status', 1)->orderByDesc('tanggal_input')->get();
    }

    public function getById($id)
    {
        return Skoring::findOrFail($id);
    }

    public function validateData(Request $request)
    {
        return $request->validate([
            'id_kriteria' => 'required|integer',
            'deskripsi' => 'required|string|max:255',
            'bobot' => 'required|numeric',
        ]);
    }

    public function create(array $data)
    {
        $data['status'] = 1;
        $data['user_input'] = Auth::user()->name ?? 'system';
        $data['tanggal_input'] = now();

        return Skoring::create($data);
    }

    public function update($id, array $data)
    {
        $record = Skoring::findOrFail($id);
        $data['user_update'] = Auth::user()->name ?? 'system';
        $data['tanggal_update'] = now();
        $record->update($data);
    }

    public function softDelete($id)
    {
        $record = Skoring::findOrFail($id);
        $record->update(['status' => 0]);
    }
}
