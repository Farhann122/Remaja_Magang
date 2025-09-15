<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SkoringService;

class SkoringController extends Controller
{
    protected $skoringService;

    public function __construct(SkoringService $skoringService)
    {
        $this->skoringService = $skoringService;
    }

    public function index()
    {
        $skoring = $this->skoringService->getAllActiveSkoring();
        return view('admin.skoring.index', compact('skoring'));
    }

    public function create()
    {
        return view('admin.skoring.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->skoringService->validateSkoringData($request);
            $skoring = $this->skoringService->createSkoring($validatedData);
            Alert::success('Berhasil', 'Daftar Skoring berhasil ditambahkan.');
            return redirect()->route('admin.skoring.edit', ['id' => $skoring->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $skoring = $this->skoringService->getSkoringById($id);
            return view('admin.skoring.edit', compact('skoring'));
        } catch (\Exception $e) {
            return redirect()->route('admin.skoring.index')
                ->with('error', 'Data skoring tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->skoringService->validateSkoringData($request);
            $this->skoringService->updateSkoring($id, $validatedData);
            Alert::success('Berhasil', 'Daftar Skoring berhasil diperbarui.');
            return redirect()->route('admin.skoring.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->skoringService->deleteSkoring($id);
            Alert::success('Berhasil', 'Skoring berhasil dihapus.');
            return redirect()->route('admin.skoring.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.skoring.index');
        }
    }
}