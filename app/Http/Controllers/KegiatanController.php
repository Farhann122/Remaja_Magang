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

    /**
     * Tampilkan daftar kegiatan
     */
    public function index()
    {
        $kegiatan = $this->service->getAllActive();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Form tambah kegiatan baru
     */
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    /**
     * Simpan data kegiatan baru
     */
    public function store(Request $request)
    {
        try {
            // Validasi data dari request menggunakan service
            $validatedData = $this->service->validateKegiatanData($request);

            // Simpan data baru
            $kegiatan = $this->service->createKegiatan($validatedData);

            // Tampilkan notifikasi sukses dan arahkan ke halaman edit
            Alert::success('Berhasil', 'Kegiatan berhasil ditambahkan.');
            return redirect()->route('admin.kegiatan.edit', ['id' => $kegiatan->id]);
        } catch (\Exception $e) {
            // Jika terjadi error, tampilkan pesan gagal
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Form edit kegiatan
     */
    public function edit($id)
    {
        $kegiatan = $this->service->getById($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update data kegiatan
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $this->service->validateKegiatanData($request);
            $this->service->updateKegiatan($id, $validated);

            Alert::success('Berhasil', 'Kegiatan berhasil diperbarui.');
            return redirect()->route('admin.kegiatan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Hapus (soft delete) kegiatan
     */
    public function destroy($id)
    {
        try {
            $this->service->softDeleteKegiatan($id);
            Alert::success('Berhasil', 'Kegiatan berhasil dihapus.');
            return redirect()->route('admin.kegiatan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
