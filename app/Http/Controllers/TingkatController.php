<?php

namespace App\Http\Controllers;

use App\Services\TingkatService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TingkatController extends Controller
{
    protected $service;

    public function __construct(TingkatService $service)
    {
        $this->service = $service;
    }

    /**
     * Tampilkan daftar tingkat
     */
    public function index()
    {
        $tingkat = $this->service->getAllActive();
        return view('admin.tingkat.index', compact('tingkat'));
    }

    /**
     * Form tambah tingkat baru
     */
    public function create()
    {
        return view('admin.tingkat.create');
    }

    /**
     * Simpan data tingkat baru
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $this->service->validateTingkatData($request);
            $tingkat = $this->service->createTingkat($validatedData);

            Alert::success('Berhasil', 'Data tingkat berhasil ditambahkan.');
            return redirect()->route('admin.tingkat.edit', ['id' => $tingkat->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Form edit tingkat
     */
    public function edit($id)
    {
        $tingkat = $this->service->getById($id);
        return view('admin.tingkat.edit', compact('tingkat'));
    }

    /**
     * Update data tingkat
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $this->service->validateTingkatData($request);
            $this->service->updateTingkat($id, $validated);

            Alert::success('Berhasil', 'Data tingkat berhasil diperbarui.');
            return redirect()->route('admin.tingkat.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Hapus (soft delete) tingkat
     */
    public function destroy($id)
    {
        try {
            $this->service->softDeleteTingkat($id);
            Alert::success('Berhasil', 'Data tingkat berhasil dihapus.');
            return redirect()->route('admin.tingkat.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
