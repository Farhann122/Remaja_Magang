<?php

namespace App\Services;

use App\Models\MakModel;
use Illuminate\Http\Request;

class MakService
{
    protected $makModel;

    public function __construct(MakModel $makModel)
    {
        $this->makModel = $makModel;
    }


    public function getAllActiveMak()
    {
        return $this->makModel->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();
    }


    public function createMak(array $data)
    {
        return $this->makModel->create($data);
    }


    public function getMakById($id)
    {
        return $this->makModel->findOrFail($id);
    }


    public function updateMak($id, array $data)
    {
        $mak = $this->makModel->findOrFail($id);
        $mak->update($data);
        return $mak;
    }


    public function deleteMak($id)
    {
        $mak = $this->makModel->findOrFail($id);
        $mak->status = 9;
        $mak->save();
        return $mak;
    }


    public function validateMakData(Request $request)
    {
        return $request->validate([
            'kode_mak' => 'required|string|max:6',
            'nama_mak' => 'required|string|max:255',
            'keterangan_mak' => 'required|string',
            'contoh_mak' => 'required|string'
        ]);
    }
}
