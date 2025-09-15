<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SatuanService;


class SatuanController extends Controller
{
    protected $satuanService;

    public function __construct(SatuanService $satuanService)
    {
        $this->satuanService = $satuanService;
    }


    public function index()
    {
        $satuans = $this->satuanService->getAllActiveSatuan();
        return view('admin.satuan.index', compact('satuans'));
    }

    public function create()
    {
        return view('admin.satuan.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->satuanService->validateSatuanData($request);
            $satuan = $this->satuanService->createSatuan($validatedData);
            Alert::success('Berhasil', 'Daftar Satuan berhasil ditambahkan.');
            return redirect()->route('admin.satuan.edit', ['id' => $satuan->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $satuan = $this->satuanService->getSatuanById($id);
            return view('admin.satuan.edit', compact('satuan'));

        } catch (\Exception $e) {
            return redirect()->route('admin.satuan.index')
                ->with('error', 'Data satuan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->satuanService->validateSatuanData($request);
            $this->satuanService->updateSatuan($id, $validatedData);
            Alert::success('Berhasil', 'Daftar Satuan berhasil diperbarui.');
            return redirect()->route('admin.satuan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->satuanService->deleteSatuan($id);
            Alert::success('Berhasil', 'Daftar Satuan berhasil dihapus.');
            return redirect()->route('admin.satuan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
