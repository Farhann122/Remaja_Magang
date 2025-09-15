<?php

namespace App\Services;

use App\Models\SuratMasukPerencanaanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratMasukPerencanaanService
{
    public function getAll()
    {
        return SuratMasukPerencanaanModel::where('status', 1)
            ->orderBy('tanggal', 'desc')
            ->get();
    }

    public function getById($id)
    {
        return SuratMasukPerencanaanModel::findOrFail($id);
    }

    public function validateData($request, $isEdit = false)
    {
        $rules = [
            'nomor' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:500',
            'keterangan' => 'required|string',
            'file' => ($isEdit ? 'nullable' : 'required') . '|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240', // 10MB (required on create)
            'keterangan_file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240', // 10MB
            'arsip_file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240', // 10MB
        ];

        $messages = [
            'nomor.required' => 'Nomor surat harus diisi',
            'nomor.string' => 'Nomor surat harus berupa teks',
            'nomor.max' => 'Nomor surat maksimal 100 karakter',
            'tanggal.required' => 'Tanggal surat harus diisi',
            'tanggal.date' => 'Tanggal surat harus berupa tanggal yang valid',
            'judul.required' => 'Judul surat harus diisi',
            'judul.string' => 'Judul surat harus berupa teks',
            'judul.max' => 'Judul surat maksimal 500 karakter',
            'keterangan.required' => 'Keterangan harus diisi',
            'keterangan.string' => 'Keterangan harus berupa teks',
            'file.required' => 'File harus diupload',
            'file.file' => 'File harus berupa file yang valid',
            'file.mimes' => 'File harus berupa PDF, DOC, DOCX, XLS, XLSX, PPT, atau PPTX',
            'file.max' => 'File maksimal 10MB',
            'keterangan_file.file' => 'File keterangan harus berupa file yang valid',
            'keterangan_file.mimes' => 'File keterangan harus berupa PDF, DOC, DOCX, XLS, XLSX, PPT, atau PPTX',
            'keterangan_file.max' => 'File keterangan maksimal 10MB',
            'arsip_file.file' => 'File arsip harus berupa file yang valid',
            'arsip_file.mimes' => 'File arsip harus berupa PDF, DOC, DOCX, XLS, XLSX, PPT, atau PPTX',
            'arsip_file.max' => 'File arsip maksimal 10MB',
        ];

        // Tambahkan validasi untuk field edit
        if ($isEdit) {
            $rules = array_merge($rules, [
                'no_arsip' => 'required|string|max:100',
                'asal_surat' => 'nullable|string|max:255',
                'kode_keuangan' => 'required|string|max:255',
                'klasifikasi' => 'required|string|max:255',
                'tipe_asal_surat' => 'nullable|string|max:50',
            ]);

            $messages = array_merge($messages, [
                'no_arsip.required' => 'No. Arsip harus diisi',
                'no_arsip.string' => 'No. Arsip harus berupa teks',
                'no_arsip.max' => 'No. Arsip maksimal 100 karakter',
                'asal_surat.string' => 'Asal surat harus berupa teks',
                'asal_surat.max' => 'Asal surat maksimal 255 karakter',
                'kode_keuangan.required' => 'Kode keuangan harus diisi',
                'kode_keuangan.string' => 'Kode keuangan harus berupa teks',
                'kode_keuangan.max' => 'Kode keuangan maksimal 255 karakter',
                'klasifikasi.required' => 'Klasifikasi harus diisi',
                'klasifikasi.string' => 'Klasifikasi harus berupa teks',
                'klasifikasi.max' => 'Klasifikasi maksimal 255 karakter',
                'tipe_asal_surat.string' => 'Tipe asal surat harus berupa teks',
                'tipe_asal_surat.max' => 'Tipe asal surat maksimal 50 karakter',
            ]);
        }

        return $request->validate($rules, $messages);
    }

    public function create($data)
    {
        return SuratMasukPerencanaanModel::create($data);
    }

    public function update($id, $data)
    {
        $suratMasuk = SuratMasukPerencanaanModel::findOrFail($id);
        $suratMasuk->update($data);
        return $suratMasuk;
    }

    public function softDelete($id)
    {
        $suratMasuk = SuratMasukPerencanaanModel::findOrFail($id);
        $suratMasuk->update(['status' => 9]);
        return $suratMasuk;
    }

    public function generateFileName($originalFile)
    {
        $tanggalUpload = now()->format('Ymd');
        $random6 = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $random4 = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $extension = $originalFile->getClientOriginalExtension();
        
        return "SM-{$tanggalUpload}-{$random6}-{$random4}.{$extension}";
    }

    public function generateKeteranganFileName($originalFile)
    {
        $tanggalUpload = now()->format('Ymd');
        $random6 = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $random4 = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $extension = $originalFile->getClientOriginalExtension();
        
        return "KT-{$tanggalUpload}-{$random6}-{$random4}.{$extension}";
    }

    public function generateArsipFileName($originalFile)
    {
        $tanggalUpload = now()->format('Ymd');
        $random6 = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $random4 = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $extension = $originalFile->getClientOriginalExtension();
        
        return "KT-{$tanggalUpload}-{$random6}-{$random4}.{$extension}";
    }

    public function uploadFile($file)
    {
        $fileName = $this->generateFileName($file);
        $filePath = $file->storeAs('surat-masuk', $fileName, 'public');
        
        return [
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_size' => $file->getSize()
        ];
    }

    public function uploadKeteranganFile($file)
    {
        $fileName = $this->generateKeteranganFileName($file);
        $filePath = $file->storeAs('surat-masuk', $fileName, 'public');
        
        return [
            'keterangan_file_path' => $filePath,
            'keterangan_file_name' => $fileName,
            'keterangan_file_size' => $file->getSize()
        ];
    }

    public function uploadArsipFile($file)
    {
        $fileName = $this->generateArsipFileName($file); // Use KT template
        $filePath = $file->storeAs('surat-masuk', $fileName, 'public');
        
        return [
            'arsip_file_path' => $filePath,
            'arsip_file_name' => $fileName,
            'arsip_file_size' => $file->getSize()
        ];
    }

    public function deleteFile($filePath)
    {
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return true;
        }
        return false;
    }

    public function deleteMainFile($id)
    {
        $suratMasuk = $this->getById($id);
        
        if ($suratMasuk->file_path) {
            $this->deleteFile($suratMasuk->file_path);
            $suratMasuk->update([
                'file_path' => null,
                'file_name' => null,
                'file_size' => null
            ]);
        }
    }

    public function deleteKeteranganFile($id)
    {
        $suratMasuk = $this->getById($id);
        
        if ($suratMasuk->keterangan_file_path) {
            $this->deleteFile($suratMasuk->keterangan_file_path);
            $suratMasuk->update([
                'keterangan_file_path' => null,
                'keterangan_file_name' => null,
                'keterangan_file_size' => null
            ]);
        }
    }

    public function deleteArsipFile($id)
    {
        $suratMasuk = $this->getById($id);
        
        if ($suratMasuk->arsip_file_path) {
            $this->deleteFile($suratMasuk->arsip_file_path);
            $suratMasuk->update([
                'arsip_file_path' => null,
                'arsip_file_name' => null,
                'arsip_file_size' => null
            ]);
        }
    }

    public function deleteFileByJenis($id, $jenis)
    {
        switch ($jenis) {
            case 'file':
                $this->deleteMainFile($id);
                return 'File berhasil dihapus!';
                
            case 'keterangan':
                $this->deleteKeteranganFile($id);
                return 'File keterangan berhasil dihapus!';
                
            default:
                throw new \Exception('Jenis file tidak valid!');
        }
    }

    public function downloadMainFile($id)
    {
        $suratMasuk = $this->getById($id);
        
        if (!$suratMasuk->file_path) {
            throw new \Exception('File tidak ditemukan!');
        }

        $filePath = storage_path('app/public/' . $suratMasuk->file_path);
        
        if (!file_exists($filePath)) {
            throw new \Exception('File tidak ditemukan di server!');
        }

        return response()->download($filePath, $suratMasuk->file_name);
    }

    public function downloadArsipFile($id)
    {
        $suratMasuk = $this->getById($id);
        
        if (!$suratMasuk->arsip_file_name) {
            throw new \Exception('File arsip tidak ditemukan!');
        }

        $filePath = storage_path('app/public/surat-masuk/' . $suratMasuk->arsip_file_name);
        
        if (!file_exists($filePath)) {
            throw new \Exception('File arsip tidak ditemukan di server!');
        }

        return response()->download($filePath, $suratMasuk->arsip_file_name);
    }
}
