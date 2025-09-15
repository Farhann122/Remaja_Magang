<?php

namespace App\Services;

use App\Models\ArsipPerencanaanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArsipPerencanaanService
{
    public function getAllActive()
    {
        return ArsipPerencanaanModel::where('status', 1)
            ->orderBy('tahun', 'desc')
            ->get();
    }

    public function getById($id)
    {
        return ArsipPerencanaanModel::where('id', $id)
            ->where('status', 1)
            ->first();
    }

    public function validateData(Request $request)
{
    return $request->validate([
        'tahun' => 'required|digits:4|integer',
        'judul' => 'required|string|max:255',
        'file'  => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240'
    ], [
        'tahun.required' => 'Tahun harus diisi',
        'tahun.digits'   => 'Tahun harus 4 digit',
        'tahun.integer'  => 'Tahun harus berupa angka',
        'judul.required' => 'Judul harus diisi',
        'judul.string'   => 'Judul harus berupa teks',
        'judul.max'      => 'Judul maksimal 255 karakter',
        'file.required'  => 'File harus diupload',
        'file.mimes'     => 'File harus berupa PDF, DOC, DOCX, XLS, XLSX, PPT, atau PPTX',
        'file.max'       => 'File maksimal 10MB',
    ]);
}

    private function generateFileName($ext)
    {
        return "ARSIP-" . now()->format('YmdHis') . "-" .
            str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT) . "-" .
            str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT) . "." . $ext;
    }

    public function uploadFile($file)
    {
        $fileName = $this->generateFileName($file->getClientOriginalExtension());
        $file->storeAs('arsip', $fileName, 'public');

        return [
            'file_name' => $fileName,
            'file_type' => $file->getClientOriginalExtension(),
            'file_size' => $file->getSize()
        ];
    }

    public function deleteFile($fileName)
    {
        $filePath = 'arsip/' . $fileName;
        return $fileName && Storage::disk('public')->exists($filePath)
            ? Storage::disk('public')->delete($filePath)
            : false;
    }

    public function create(array $data)
    {
        return ArsipPerencanaanModel::create($data);
    }

    public function update($id, array $data)
    {
        $arsip = ArsipPerencanaanModel::findOrFail($id);
        $arsip->update($data);
        return $arsip;
    }

    public function softDelete($id)
    {
        $arsip = ArsipPerencanaanModel::findOrFail($id);
        $this->deleteFile($arsip->file_name);

        $arsip->update(['status' => 9]);
        return $arsip;
    }

    public function deleteFileOnly($id)
    {
        $arsip = ArsipPerencanaanModel::findOrFail($id);
        $this->deleteFile($arsip->file_name);

        $arsip->update([
            'file_name' => null,
            'file_type' => null,
            'file_size' => null
        ]);

        return $arsip;
    }
}
