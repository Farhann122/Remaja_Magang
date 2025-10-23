<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PublikasiService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PublikasiController extends Controller
{
    protected $service;

    public function __construct(PublikasiService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $publikasi = $this->service->getAllActive();
        return view('admin.publikasi.index', compact('publikasi'));
    }

    public function create()
    {
        return view('admin.publikasi.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->service->validatePublikasiData($request);
            $publikasi = $this->service->createPublikasi($validated);

            Alert::success('Berhasil', 'Publikasi berhasil ditambahkan.');
            return redirect()->route('admin.publikasi.edit', $publikasi->id);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $publikasi = $this->service->getById($id);
        return view('admin.publikasi.edit', compact('publikasi'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->service->validatePublikasiData($request);
            $this->service->updatePublikasi($id, $validated);

            Alert::success('Berhasil', 'Publikasi berhasil diperbarui.');
            return redirect()->route('admin.publikasi.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->softDeletePublikasi($id);
            Alert::success('Berhasil', 'Publikasi berhasil dihapus.');
            return redirect()->route('admin.publikasi.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
