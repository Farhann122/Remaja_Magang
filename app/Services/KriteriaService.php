<?php

namespace App\Services;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaService
{
    public function getAllActive()
    {
        return Kriteria::where('status', 1)
            ->orderBy('tanggal_input', 'desc')
            ->get();
    }

    public function getById($id)
    {
        return Kriteria::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function validateData(Request $request)
    {
        return $request->validate([
            'kriteria' => 'required|string|max:255',
            'bobot' => 'required|numeric|min:0|max:100',
        ], [
            'kriteria.required' => 'Nama kriteria harus diisi.',
            'bobot.required' => 'Bobot harus diisi.',
            'bobot.numeric' => 'Bobot harus berupa angka.',
        ]);
    }

    public function create(array $data)
    {
        $data['status'] = 1;
        return Kriteria::create($data);
    }

    public function update($id, array $data)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update($data);
        return $kriteria;
    }

    public function softDelete($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update(['status' => 9]);
        return $kriteria;
    }
}
