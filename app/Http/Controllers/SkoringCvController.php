<?php

namespace App\Http\Controllers;

use App\Services\SkoringCvService;
use App\Services\KegiatanService;
use App\Services\TingkatService;
use App\Services\PartisipasiService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SkoringCvController extends Controller
{
    protected $skoringCvService;
    protected $kegiatanService;
    protected $tingkatService;
    protected $partisipasiService;

    public function __construct(
        SkoringCvService $skoringCvService,
        KegiatanService $kegiatanService,
        TingkatService $tingkatService,
        PartisipasiService $partisipasiService
    ) {
        $this->skoringCvService = $skoringCvService;
        $this->kegiatanService = $kegiatanService;
        $this->tingkatService = $tingkatService;
        $this->partisipasiService = $partisipasiService;
    }

    public function index()
    {
        $skoringCv = $this->skoringCvService->getAllActive();
        return view('admin.skoring_cv.index', compact('skoringCv'));
    }

    public function create()
    {
        $kegiatan = $this->kegiatanService->getAllActive();
        $tingkat = $this->tingkatService->getAllActive();
        $partisipasi = $this->partisipasiService->getAllActive();

        return view('admin.skoring_cv.create', compact('kegiatan', 'tingkat', 'partisipasi'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->skoringCvService->validateData($request);
            $skoringCv = $this->skoringCvService->create($validatedData);

            Alert::success('Berhasil', 'Skoring CV berhasil ditambahkan.');
            return redirect()->route('admin.skoring_cv.edit', ['id' => $skoringCv->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $skoringCv = $this->skoringCvService->getById($id);
        $kegiatan = $this->kegiatanService->getAllActive();
        $tingkat = $this->tingkatService->getAllActive();
        $partisipasi = $this->partisipasiService->getAllActive();

        return view('admin.skoring_cv.edit', compact('skoringCv', 'kegiatan', 'tingkat', 'partisipasi'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->skoringCvService->validateData($request);
            $this->skoringCvService->update($id, $validated);

            Alert::success('Berhasil', 'Data Skoring CV berhasil diperbarui.');
            return redirect()->route('admin.skoring_cv.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->skoringCvService->softDelete($id);
            Alert::success('Berhasil', 'Data Skoring CV berhasil dihapus.');
            return redirect()->route('admin.skoring_cv.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return back();
        }
    }
}
