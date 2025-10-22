<?php

namespace App\Http\Controllers;

use App\Services\PartisipasiService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PartisipasiController extends Controller
{
    protected $partisipasiService;

    public function __construct(PartisipasiService $partisipasiService)
    {
        $this->partisipasiService = $partisipasiService;
    }

    public function index()
    {
        $partisipasi = $this->partisipasiService->getAllActive();
        return view('admin.partisipasi.index', compact('partisipasi'));
    }

    public function create()
    {
        return view('admin.partisipasi.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->partisipasiService->validatePartisipasiData($request);
            $partisipasi = $this->partisipasiService->createPartisipasi($validated);
            Alert::success('Berhasil', 'Partisipasi berhasil ditambahkan.');
            return redirect()->route('admin.partisipasi.edit', ['id' => $partisipasi->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $partisipasi = $this->partisipasiService->getById($id);
        return view('admin.partisipasi.edit', compact('partisipasi'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->partisipasiService->validatePartisipasiData($request);
            $this->partisipasiService->update($id, $validated);
            Alert::success('Berhasil', 'Partisipasi berhasil diperbarui.');
            return redirect()->route('admin.partisipasi.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->partisipasiService->softDelete($id);
            Alert::success('Berhasil', 'Partisipasi berhasil dihapus.');
            return redirect()->route('admin.partisipasi.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}
