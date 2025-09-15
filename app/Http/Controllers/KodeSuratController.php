<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\KodeSuratService;

class KodeSuratController extends Controller
{
    protected $kodeSuratService;

    public function __construct(KodeSuratService $kodeSuratService)
    {
        $this->kodeSuratService = $kodeSuratService;
    }

    public function index()
    {
        $kodeSurat = $this->kodeSuratService->getAllActiveKodeSurat();
        return view('admin.kode_surat.index', compact('kodeSurat'));
    }

    public function create()
    {
        return view('admin.kode_surat.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->kodeSuratService->validateKodeSuratData($request);
            $kodeSurat = $this->kodeSuratService->createKodeSurat($validatedData);
            Alert::success('Berhasil', 'Daftar Kode Surat berhasil ditambahkan.');
            return redirect()->route('admin.kode_surat.edit', ['id' => $kodeSurat->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $kodeSurat = $this->kodeSuratService->getKodeSuratById($id);
            return view('admin.kode_surat.edit', compact('kodeSurat'));
        } catch (\Exception $e) {
            return redirect()->route('admin.kode_surat.index')
                ->with('error', 'Data kode surat tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->kodeSuratService->validateKodeSuratData($request);
            $this->kodeSuratService->updateKodeSurat($id, $validatedData);
            Alert::success('Berhasil', 'Daftar Kode Surat berhasil diperbarui.');
            return redirect()->route('admin.kode_surat.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->kodeSuratService->deleteKodeSurat($id);
            Alert::success('Berhasil', 'Kode Surat berhasil dihapus.');
            return redirect()->route('admin.kode_surat.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.kode_surat.index');
        }
    }
}
