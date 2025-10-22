<?php

namespace App\Http\Controllers;

use App\Services\KriteriaService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaController extends Controller
{
    protected $kriteriaService;

    public function __construct(KriteriaService $kriteriaService)
    {
        $this->kriteriaService = $kriteriaService;
    }

    public function index()
    {
        $kriteria = $this->kriteriaService->getAllActive();
        return view('admin.kriteria.index', compact('kriteria'));
    }

    public function create()
    {
        return view('admin.kriteria.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->kriteriaService->validateData($request);
            $kriteria = $this->kriteriaService->create($validated);

            Alert::success('Berhasil', 'Kriteria berhasil ditambahkan.');
            return redirect()->route('admin.kriteria.edit', ['id' => $kriteria->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $kriteria = $this->kriteriaService->getById($id);
        return view('admin.kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->kriteriaService->validateData($request);
            $this->kriteriaService->update($id, $validated);

            Alert::success('Berhasil', 'Kriteria berhasil diperbarui.');
            return redirect()->route('admin.kriteria.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->kriteriaService->softDelete($id);
            Alert::success('Berhasil', 'Kriteria berhasil dihapus.');
            return redirect()->route('admin.kriteria.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return redirect()->back();
        }
    }
}
