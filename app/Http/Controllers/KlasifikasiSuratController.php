<?php

namespace App\Http\Controllers;

use App\Services\KlasifikasiSuratService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KlasifikasiSuratController extends Controller
{
    protected $klasifikasiSuratService;

    public function __construct(KlasifikasiSuratService $klasifikasiSuratService)
    {
        $this->klasifikasiSuratService = $klasifikasiSuratService;
    }

    public function index()
    {
        $klasifikasiSurat = $this->klasifikasiSuratService->getAllActiveKlasifikasiSurat();
        return view('admin.klasifikasi_surat.index', compact('klasifikasiSurat'));
    }

    public function create()
    {
        return view('admin.klasifikasi_surat.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->klasifikasiSuratService->validateKlasifikasiSuratData($request);
            $klasifikasiSurat = $this->klasifikasiSuratService->createKlasifikasiSurat($validatedData);
            Alert::success('Berhasil', 'Daftar Klasifikasi Surat berhasil ditambahkan.');
            return redirect()->route('admin.klasifikasi_surat.edit', ['id' => $klasifikasiSurat->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $klasifikasiSurat = $this->klasifikasiSuratService->getKlasifikasiSuratById($id);
            return view('admin.klasifikasi_surat.edit', compact('klasifikasiSurat'));
        } catch (\Exception $e) {
            return redirect()->route('admin.klasifikasi_surat.index')
                ->with('error', 'Data klasifikasi surat tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->klasifikasiSuratService->validateKlasifikasiSuratData($request);
            $this->klasifikasiSuratService->updateKlasifikasiSurat($id, $validatedData);
            Alert::success('Berhasil', 'Daftar Klasifikasi Surat berhasil diperbarui.');
            return redirect()->route('admin.klasifikasi_surat.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->klasifikasiSuratService->deleteKlasifikasiSurat($id);
            Alert::success('Berhasil', 'Klasifikasi Surat berhasil dihapus.');
            return redirect()->route('admin.klasifikasi_surat.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.klasifikasi_surat.index');
        }
    }
}

