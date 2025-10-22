<?php

namespace App\Http\Controllers;

use App\Services\KontenSettingService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KontenSettingController extends Controller
{
    protected $service;

    public function __construct(KontenSettingService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $data = $this->service->getAllActive();
        return view('admin.konten_setting.index', compact('data'));
    }

    public function create()
    {
        return view('admin.konten_setting.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->service->validateData($request);
            $setting = $this->service->create($validated);

            Alert::success('Berhasil', 'Konten Setting berhasil ditambahkan.');
            return redirect()->route('admin.konten_setting.edit', ['id' => $setting->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $setting = $this->service->getById($id);
        return view('admin.konten_setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->service->validateData($request);
            $this->service->update($id, $validated);

            Alert::success('Berhasil', 'Konten Setting berhasil diperbarui.');
            return redirect()->route('admin.konten_setting.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->softDelete($id);
            Alert::success('Berhasil', 'Konten Setting berhasil dihapus.');
            return redirect()->route('admin.konten-setting.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
