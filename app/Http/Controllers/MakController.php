<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MakService;


class MakController extends Controller
{
    protected $makService;

    public function __construct(MakService $makService)
    {
        $this->makService = $makService;
    }


    public function index()
    {
        $maks = $this->makService->getAllActiveMak();
        return view('admin.mak.index', compact('maks'));
    }

    public function create()
    {
        return view('admin.mak.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->makService->validateMakData($request);
            $mak = $this->makService->createMak($validatedData);
            Alert::success('Berhasil', 'Daftar MAK berhasil ditambahkan.');
            return redirect()->route('admin.mak.edit', ['id' => $mak->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $mak = $this->makService->getMakById($id);
            return view('admin.mak.edit', compact('mak'));

        } catch (\Exception $e) {
            return redirect()->route('admin.mak.index')
                ->with('error', 'Data MAK tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->makService->validateMakData($request);
            $this->makService->updateMak($id, $validatedData);
            Alert::success('Berhasil', 'Daftar MAK berhasil diperbarui.');
            return redirect()->route('admin.mak.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->makService->deleteMak($id);
            Alert::success('Berhasil', 'Daftar MAK berhasil dihapus.');
            return redirect()->route('admin.mak.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
