<?php

namespace App\Http\Controllers;

use App\Services\KegiatanService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KegiatanController extends Controller
{
    protected $service;

    public function __construct(KegiatanService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $kegiatan = $this->service->getAllActive();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->service->validateKegiatanData($request);
            $kegiatan = $this->service->createKegiatan($validated);

            Alert::success('Berhasil', 'Kegiatan berhasil ditambahkan.');
            // ✅ Setelah create, arahkan ke halaman edit
            return redirect()->route('admin.kegiatan.edit', $kegiatan->id);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $kegiatan = $this->service->getById($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->service->validateKegiatanData($request);
            $this->service->updateKegiatan($id, $validated);

            Alert::success('Berhasil', 'Kegiatan berhasil diperbarui.');
            return redirect()->route('admin.kegiatan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->softDeleteKegiatan($id);
            Alert::success('Berhasil', 'Kegiatan berhasil dihapus.');
            return redirect()->route('admin.kegiatan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}
