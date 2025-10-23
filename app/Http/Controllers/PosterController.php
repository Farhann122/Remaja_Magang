<?php

namespace App\Http\Controllers;

use App\Services\PosterService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PosterController extends Controller
{
    protected $service;

    public function __construct(PosterService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $data = $this->service->getAllActive();
        return view('admin.poster.index', compact('data'));
    }

    public function create()
    {
        return view('admin.poster.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->service->validateData($request);
            $file = $request->file('file');
            $this->service->createPoster($validated, $file);

            Alert::success('Berhasil', 'Poster berhasil ditambahkan.');
            return redirect()->route('admin.poster.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $poster = $this->service->getById($id);
        return view('admin.poster.edit', compact('poster'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->service->validateData($request, true);
            $file = $request->file('file');
            $this->service->updatePoster($id, $validated, $file);

            Alert::success('Berhasil', 'Poster berhasil diperbarui.');
            return redirect()->route('admin.poster.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->softDelete($id);
            Alert::success('Berhasil', 'Poster berhasil dihapus.');
            return redirect()->route('admin.poster.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
