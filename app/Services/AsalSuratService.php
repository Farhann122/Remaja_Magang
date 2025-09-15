<?php

namespace App\Services;

use App\Models\AsalSuratModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsalSuratService
{
    protected $asalSuratModel;

    public function __construct(AsalSuratModel $asalSuratModel)
    {
        $this->asalSuratModel = $asalSuratModel;
    }

    public function getAllActiveAsalSurat()
    {
        return $this->asalSuratModel->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();
    }

    public function getAsalSuratById($id)
    {
        return $this->asalSuratModel->findOrFail($id);
    }

    public function validateAsalSuratData(Request $request)
    {
        return $request->validate([
            'asal_surat' => 'required|string|max:255'
        ], [
            'asal_surat.required' => 'Asal Surat harus diisi',
            'asal_surat.string' => 'Asal Surat harus berupa teks',
            'asal_surat.max' => 'Asal Surat maksimal 255 karakter',
        ]);
    }

    public function createAsalSurat(array $data)
    {
        return $this->asalSuratModel->create($data);
    }

    public function updateAsalSurat($id, array $data)
    {
        $asalSurat = $this->asalSuratModel->findOrFail($id);
        $asalSurat->update($data);
        return $asalSurat;
    }

    public function deleteAsalSurat($id)
    {
        $asalSurat = $this->asalSuratModel->findOrFail($id);
        $asalSurat->update(['status' => 9]);
        return $asalSurat;
    }
}
