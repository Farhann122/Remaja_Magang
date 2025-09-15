<?php

namespace App\Http\Controllers;

use App\Services\AsalSuratService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AsalSuratController extends Controller
{
    protected $asalSuratService;

    public function __construct(AsalSuratService $asalSuratService)
    {
        $this->asalSuratService = $asalSuratService;
    }

    public function index()
    {
        $asalSurat = $this->asalSuratService->getAllActiveAsalSurat();
        return view('admin.asal_surat.index', compact('asalSurat'));
    }

    public function create()
    {
        return view('admin.asal_surat.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->asalSuratService->validateAsalSuratData($request);
            $asalSurat = $this->asalSuratService->createAsalSurat($validatedData);
            Alert::success('Berhasil', 'Daftar Asal/Tujuan Surat berhasil ditambahkan.');
            return redirect()->route('admin.asal_surat.edit', ['id' => $asalSurat->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $asalSurat = $this->asalSuratService->getAsalSuratById($id);
            return view('admin.asal_surat.edit', compact('asalSurat'));
        } catch (\Exception $e) {
            return redirect()->route('admin.asal_surat.index')
                ->with('error', 'Data asal surat tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->asalSuratService->validateAsalSuratData($request);
            $this->asalSuratService->updateAsalSurat($id, $validatedData);
            Alert::success('Berhasil', 'Daftar Asal/Tujuan Surat berhasil diperbarui.');
            return redirect()->route('admin.asal_surat.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->asalSuratService->deleteAsalSurat($id);
            Alert::success('Berhasil', 'Asal/Tujuan Surat berhasil dihapus.');
            return redirect()->route('admin.asal_surat.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.asal_surat.index');
        }
    }
}
