<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SuratMasukPerencanaanService;
use RealRashid\SweetAlert\Facades\Alert;

class SuratMasukPerencanaanController extends Controller
{
    protected $suratMasukPerencanaanService;

    public function __construct(SuratMasukPerencanaanService $suratMasukPerencanaanService)
    {
        $this->suratMasukPerencanaanService = $suratMasukPerencanaanService;
    }

    public function index()
    {
        $suratMasukPerencanaan = $this->suratMasukPerencanaanService->getAll();
        return view('admin.surat_masuk_perencanaan.index', compact('suratMasukPerencanaan'));
    }

    public function create()
    {
        return view('admin.surat_masuk_perencanaan.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->suratMasukPerencanaanService->validateData($request, false);
            
            $data = $validatedData;

            // Handle file upload
            if ($request->hasFile('file')) {
                $fileData = $this->suratMasukPerencanaanService->uploadFile($request->file('file'));
                $data = array_merge($data, $fileData);
            }

            $suratMasuk = $this->suratMasukPerencanaanService->create($data);

            Alert::success('Berhasil', 'Daftar Surat Masuk Perencanaan berhasil ditambahkan.');
            return redirect()->route('admin.surat_masuk_perencanaan.edit', ['id' => $suratMasuk->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $suratMasukPerencanaan = $this->suratMasukPerencanaanService->getById($id);
            return view('admin.surat_masuk_perencanaan.edit', compact('suratMasukPerencanaan'));
        } catch (\Exception $e) {
            return redirect()->route('admin.surat_masuk_perencanaan.index')
                ->with('error', 'Data surat masuk perencanaan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->suratMasukPerencanaanService->validateData($request, true);
            
            $data = $validatedData;

            // Handle file uploads
            if ($request->hasFile('file')) {
                $fileData = $this->suratMasukPerencanaanService->uploadFile($request->file('file'));
                $data = array_merge($data, $fileData);
            }

            if ($request->hasFile('keterangan_file')) {
                $keteranganFileData = $this->suratMasukPerencanaanService->uploadKeteranganFile($request->file('keterangan_file'));
                $data = array_merge($data, $keteranganFileData);
            }

            if ($request->hasFile('arsip_file')) {
                $arsipFileData = $this->suratMasukPerencanaanService->uploadArsipFile($request->file('arsip_file'));
                $data = array_merge($data, $arsipFileData);
            }

            $this->suratMasukPerencanaanService->update($id, $data);

            Alert::success('Berhasil', 'Daftar Surat Masuk Perencanaan berhasil diperbarui.');
            return redirect()->route('admin.surat_masuk_perencanaan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->suratMasukPerencanaanService->softDelete($id);
            Alert::success('Berhasil', 'Surat Masuk Perencanaan berhasil dihapus.');
            return redirect()->route('admin.surat_masuk_perencanaan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.surat_masuk_perencanaan.index');
        }
    }

    public function deleteFile($id)
    {
        try {
            $this->suratMasukPerencanaanService->deleteMainFile($id);
            return response()->json([
                'success' => true,
                'message' => 'File berhasil dihapus!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus file: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteKeteranganFile($id)
    {
        try {
            $this->suratMasukPerencanaanService->deleteKeteranganFile($id);
            return response()->json([
                'success' => true,
                'message' => 'File keterangan berhasil dihapus!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus file keterangan: ' . $e->getMessage()
            ], 500);
        }
    }


    public function deleteArsipFile($id)
    {
        try {
            $this->suratMasukPerencanaanService->deleteArsipFile($id);
            return response()->json([
                'success' => true,
                'message' => 'File arsip berhasil dihapus!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus file arsip: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteFileByJenis($id, $jenis)
    {
        try {
            $message = $this->suratMasukPerencanaanService->deleteFileByJenis($id, $jenis);
            return response()->json([
                'success' => true,
                'message' => $message
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus file: ' . $e->getMessage()
            ], 500);
        }
    }

    public function downloadFile($id)
    {
        try {
            return $this->suratMasukPerencanaanService->downloadMainFile($id);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Gagal mengunduh file: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function downloadArsipFile($id)
    {
        try {
            return $this->suratMasukPerencanaanService->downloadArsipFile($id);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Gagal mengunduh file arsip: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
