<?php

namespace App\Http\Controllers;

use App\Services\JabatanService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JabatanController extends Controller
{
    protected $jabatanService;

    public function __construct(JabatanService $jabatanService)
    {
        $this->jabatanService = $jabatanService;
    }

    public function index()
    {
        $jabatan = $this->jabatanService->getAllActiveJabatan();
        return view('admin.jabatan.index', compact('jabatan'));
    }

    public function create()
    {
        return view('admin.jabatan.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->jabatanService->validateJabatanData($request);
            $jabatan = $this->jabatanService->createJabatan($validatedData);
            Alert::success('Berhasil', 'Daftar Jabatan berhasil ditambahkan.');
            return redirect()->route('admin.jabatan.edit', ['id' => $jabatan->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $jabatan = $this->jabatanService->getJabatanById($id);
            return view('admin.jabatan.edit', compact('jabatan'));
        } catch (\Exception $e) {
            return redirect()->route('admin.jabatan.index')
                ->with('error', 'Data jabatan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->jabatanService->validateJabatanData($request);
            $this->jabatanService->updateJabatan($id, $validatedData);
            Alert::success('Berhasil', 'Daftar Jabatan berhasil diperbarui.');
            return redirect()->route('admin.jabatan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->jabatanService->deleteJabatan($id);
            Alert::success('Berhasil', 'Daftar Jabatan berhasil dihapus.');
            return redirect()->route('admin.jabatan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.jabatan.index');
        }
    }
}
