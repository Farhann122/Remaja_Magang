<?php

namespace App\Services;

use App\Models\JabatanModel;
use Illuminate\Http\Request;

class JabatanService
{
    protected $jabatanModel;

    public function __construct(JabatanModel $jabatanModel)
    {
        $this->jabatanModel = $jabatanModel;
    }

    public function getAllActiveJabatan()
    {
        return $this->jabatanModel->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();
    }

    public function getJabatanById($id)
    {
        return $this->jabatanModel->where('id', $id)
            ->where('status', 1)
            ->first();
    }

    public function validateJabatanData(Request $request)
    {
        return $request->validate([
            'jabatan' => 'required|string|max:100',
            'peran' => 'required|string|max:100'
        ]);
    }

    public function createJabatan(array $data)
    {
        return $this->jabatanModel->create($data);
    }

    public function updateJabatan($id, array $data)
    {
        $jabatan = $this->jabatanModel->find($id);
        if ($jabatan) {
            $jabatan->update($data);
            return $jabatan;
        }
        return null;
    }

    public function deleteJabatan($id)
    {
        $jabatan = $this->jabatanModel->find($id);
        if ($jabatan) {
            $jabatan->update(['status' => 9]);
            return true;
        }
        return false;
    }
}
