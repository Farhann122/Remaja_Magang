<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ArsipPerencanaanService;

class ArsipPerencanaanController extends Controller
{
    protected $arsipService;

    public function __construct(ArsipPerencanaanService $arsipService)
    {
        $this->arsipService = $arsipService;
    }

    public function index()
    {
        $arsipPerencanaan = $this->arsipService->getAllActive();
        return view('admin.arsip_perencanaan.index', compact('arsipPerencanaan'));
    }

    public function create()
    {
        return view('admin.arsip_perencanaan.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->arsipService->validateData($request);

            $fileData = $request->hasFile('file')
                ? $this->arsipService->uploadFile($request->file('file'))
                : [];

            $arsip = $this->arsipService->create(array_merge($validated, $fileData));

            Alert::success('Berhasil', 'Daftar Arsip Perencanaan berhasil ditambahkan.');
            return redirect()->route('admin.arsip_perencanaan.edit', ['id' => $arsip->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $arsipPerencanaan = $this->arsipService->getById($id);
            return view('admin.arsip_perencanaan.edit', compact('arsipPerencanaan'));
        } catch (\Exception $e) {
            return redirect()->route('admin.arsip_perencanaan.index')
                ->with('error', 'Data tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->arsipService->validateData($request);

            $arsip = $this->arsipService->getById($id);

            if ($request->hasFile('file')) {
                $this->arsipService->deleteFile($arsip->file_path);
                $fileData = $this->arsipService->uploadFile($request->file('file'));
            } else {
                $fileData = [];
            }

            $this->arsipService->update($id, array_merge($validated, $fileData));

            Alert::success('Berhasil', 'Daftar Arsip Perencanaan berhasil diperbarui.');
            return redirect()->route('admin.arsip_perencanaan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->arsipService->softDelete($id);
            Alert::success('Berhasil', 'Arsip berhasil dihapus.');
            return redirect()->route('admin.arsip_perencanaan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.arsip_perencanaan.index');
        }
    }

    public function deleteFile($id)
    {
        try {
            $this->arsipService->deleteFileOnly($id);
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

    public function downloadFile($id)
    {
        try {
            $arsipPerencanaan = $this->arsipService->getById($id);
            
            if (!$arsipPerencanaan->file_name) {
                Alert::error('Gagal', 'File tidak ditemukan!');
                return redirect()->back();
            }

            $filePath = storage_path('app/public/arsip/' . $arsipPerencanaan->file_name);
            
            if (!file_exists($filePath)) {
                Alert::error('Gagal', 'File tidak ditemukan di server!');
                return redirect()->back();
            }

            return response()->download($filePath, $arsipPerencanaan->file_name);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Gagal mengunduh file: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function deleteFileOnly($id)
    {
        try {
            $this->arsipService->deleteFileOnly($id);
            Alert::success('Berhasil', 'File berhasil dihapus.');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus file.');
            return redirect()->back();
        }
    }
}
