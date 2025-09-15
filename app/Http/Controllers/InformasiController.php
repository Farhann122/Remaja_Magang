<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\InformasiService;

class InformasiController extends Controller
{
    protected $informasiService;

    public function __construct(InformasiService $informasiService)
    {
        $this->informasiService = $informasiService;
    }

    public function index()
    {
        $informasi = $this->informasiService->getAllActiveInformasi();
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->informasiService->validateInformasiData($request);
            $informasi = $this->informasiService->createInformasi($validatedData);
            Alert::success('Berhasil', 'Daftar Informasi berhasil ditambahkan.');
            return redirect()->route('admin.informasi.edit', ['id' => $informasi->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $informasi = $this->informasiService->getInformasiById($id);
            return view('admin.informasi.edit', compact('informasi'));
        } catch (\Exception $e) {
            return redirect()->route('admin.informasi.index')
                ->with('error', 'Data informasi tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->informasiService->validateInformasiData($request);
            $this->informasiService->updateInformasi($id, $validatedData);
            Alert::success('Berhasil', 'Daftar Informasi berhasil diperbarui.');
            return redirect()->route('admin.informasi.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->informasiService->deleteInformasi($id);
            Alert::success('Berhasil', 'Informasi berhasil dihapus.');
            return redirect()->route('admin.informasi.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.informasi.index');
        }
    }
}
