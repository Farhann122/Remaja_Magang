<?php

namespace App\Services;

use App\Models\KodeSuratModel;
use Illuminate\Http\Request;

class KodeSuratService
{
    protected $kodeSuratModel;

    public function __construct(KodeSuratModel $kodeSuratModel)
    {
        $this->kodeSuratModel = $kodeSuratModel;
    }

    public function getAllActiveKodeSurat()
    {
        return $this->kodeSuratModel->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();
    }

    public function getKodeSuratById($id)
    {
        return $this->kodeSuratModel->where('id', $id)
            ->where('status', 1)
            ->first();
    }

    public function validateKodeSuratData(Request $request)
    {
        return $request->validate([
            'kode_surat' => 'required|string|max:50',
            'keterangan' => 'required|string|max:255'
        ]);
    }

    public function createKodeSurat(array $data)
    {
        return $this->kodeSuratModel->create($data);
    }

    public function updateKodeSurat($id, array $data)
    {
        return $this->kodeSuratModel->where('id', $id)
            ->where('status', 1)
            ->update($data);
    }

    public function deleteKodeSurat($id)
    {
        return $this->kodeSuratModel->where('id', $id)
            ->where('status', 1)
            ->update(['status' => 9]);
    }
}
