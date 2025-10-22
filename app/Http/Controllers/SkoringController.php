<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Skoring;
use App\Services\SkoringService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SkoringController extends Controller
{
    protected $service;

    public function __construct(SkoringService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $skoring = $this->service->getAllActive();
        return view('admin.skoring.index', compact('skoring'));
    }

    public function create()
{
    $kriteria = Kriteria::where('status', 1)->get();
    return view('admin.skoring.create', compact('kriteria'));
}

    public function store(Request $request)
    {
        try {
            $validated = $this->service->validateData($request);
            $skoring = $this->service->create($validated);

            Alert::success('Berhasil', 'Data Skoring berhasil ditambahkan.');
            return redirect()->route('admin.skoring.edit', ['id' => $skoring->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return back()->withInput();
        }
    }

    public function edit($id)
{
    $skoring = Skoring::findOrFail($id);
    $kriteria = Kriteria::where('status', 1)->get();
    return view('admin.skoring.edit', compact('skoring', 'kriteria'));
}

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->service->validateData($request);
            $this->service->update($id, $validated);

            Alert::success('Berhasil', 'Data Skoring berhasil diperbarui.');
            return redirect()->route('admin.skoring.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->softDelete($id);
            Alert::success('Berhasil', 'Data Skoring berhasil dihapus.');
            return redirect()->route('admin.skoring.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return back();
        }
    }
}
