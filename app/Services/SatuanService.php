<?php

namespace App\Services;

use App\Models\SatuanModel;
use Illuminate\Http\Request;

class SatuanService
{
    protected $satuanModel;

    public function __construct(SatuanModel $satuanModel)
    {
        $this->satuanModel = $satuanModel;
    }


    public function getAllActiveSatuan()
    {
        return $this->satuanModel->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();
    }


    public function createSatuan(array $data)
    {
        return $this->satuanModel->create($data);
    }


    public function getSatuanById($id)
    {
        return $this->satuanModel->findOrFail($id);
    }


    public function updateSatuan($id, array $data)
    {
        $satuan = $this->satuanModel->findOrFail($id);
        $satuan->update($data);
        return $satuan;
    }


    public function deleteSatuan($id)
    {
        $satuan = $this->satuanModel->findOrFail($id);
        $satuan->status = 9;
        $satuan->save();
        return $satuan;
    }


    public function validateSatuanData(Request $request)
    {
        return $request->validate([
            'kode_satuan' => 'required|string|max:50',
            'nama_satuan' => 'required|string|max:100'
        ]);
    }
}
