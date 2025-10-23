<?php

namespace App\Http\Controllers;

use App\Services\AlbumFotoService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AlbumFotoController extends Controller
{
    protected $service;

    public function __construct(AlbumFotoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $album = $this->service->getAllActive();
        return view('admin.album_foto.index', compact('album'));
    }

    public function create()
    {
        return view('admin.album_foto.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->service->validateAlbumFotoData($request);
            $album = $this->service->createAlbumFoto($validated);

            Alert::success('Berhasil', 'Album foto berhasil ditambahkan.');
            return redirect()->route('admin.album_foto.edit', ['id' => $album->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $album = $this->service->getById($id);
        return view('admin.album_foto.edit', compact('album'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->service->validateAlbumFotoData($request);
            $this->service->updateAlbumFoto($id, $validated);

            Alert::success('Berhasil', 'Album foto berhasil diperbarui.');
            return redirect()->route('admin.album_foto.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->softDeleteAlbumFoto($id);
            Alert::success('Berhasil', 'Album foto berhasil dihapus.');
            return redirect()->route('admin.album_foto.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
