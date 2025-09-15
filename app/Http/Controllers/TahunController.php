<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TahunService;


class TahunController extends Controller
{
    protected $tahunService;

    public function __construct(TahunService $tahunService)
    {
        $this->tahunService = $tahunService;
    }


    public function index()
    {
        $tahuns = $this->tahunService->getAllActiveTahun();
        return view('admin.tahun.index', compact('tahuns'));
    }

    public function create()
    {
        return view('admin.tahun.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->tahunService->validateTahunData($request);
            $tahun = $this->tahunService->createTahun($validatedData);
            Alert::success('Berhasil', 'Daftar Tahun berhasil ditambahkan.');
            return redirect()->route('admin.tahun.edit', ['id' => $tahun->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $tahun = $this->tahunService->getTahunById($id);
            return view('admin.tahun.edit', compact('tahun'));

        } catch (\Exception $e) {
            return redirect()->route('admin.tahun.index')
                ->with('error', 'Data tahun tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->tahunService->validateTahunData($request);
            $this->tahunService->updateTahun($id, $validatedData);
            Alert::success('Berhasil', 'Daftar Tahun berhasil diperbarui.');
            return redirect()->route('admin.tahun.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->tahunService->deleteTahun($id);
            Alert::success('Berhasil', 'Tahun berhasil dihapus.');
            return redirect()->route('admin.tahun.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.tahun.index');
        }
    }
}