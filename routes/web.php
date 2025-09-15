<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\MakController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KodeSuratController;
use App\Http\Controllers\KlasifikasiSuratController;
use App\Http\Controllers\AsalSuratController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\SkoringController;
use App\Http\Controllers\ArsipPerencanaanController;
use App\Http\Controllers\SuratMasukPerencanaanController;
use App\Http\Controllers\Auth\LoginController;



Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/tahun', [TahunController::class, 'index'])->name('tahun.index');
    Route::get('/tahun/add', [TahunController::class, 'create'])->name('tahun.add');
    Route::post('/tahun/add', [TahunController::class, 'store'])->name('tahun.store');
    Route::get('/tahun/edit/{id}', [TahunController::class, 'edit'])->name('tahun.edit');
    Route::put('/tahun/{id}', [TahunController::class, 'update'])->name('tahun.update');
    Route::delete('/tahun/{id}', [TahunController::class, 'destroy'])->name('tahun.destroy');

    Route::get('/satuan', [SatuanController::class, 'index'])->name('satuan.index');
    Route::get('/satuan/add', [SatuanController::class, 'create'])->name('satuan.add');
    Route::post('/satuan/add', [SatuanController::class, 'store'])->name('satuan.store');
    Route::get('/satuan/edit/{id}', [SatuanController::class, 'edit'])->name('satuan.edit');
    Route::put('/satuan/{id}', [SatuanController::class, 'update'])->name('satuan.update');
    Route::delete('/satuan/{id}', [SatuanController::class, 'destroy'])->name('satuan.destroy');

    Route::get('/mak', [MakController::class, 'index'])->name('mak.index');
    Route::get('/mak/add', [MakController::class, 'create'])->name('mak.add');
    Route::post('/mak/add', [MakController::class, 'store'])->name('mak.store');
    Route::get('/mak/edit/{id}', [MakController::class, 'edit'])->name('mak.edit');
    Route::put('/mak/{id}', [MakController::class, 'update'])->name('mak.update');
    Route::delete('/mak/{id}', [MakController::class, 'destroy'])->name('mak.destroy');

    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::get('/jabatan/add', [JabatanController::class, 'create'])->name('jabatan.add');
    Route::post('/jabatan/add', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::get('/jabatan/edit/{id}', [JabatanController::class, 'edit'])->name('jabatan.edit');
    Route::put('/jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');

    Route::get('/kode-surat', [KodeSuratController::class, 'index'])->name('kode_surat.index');
    Route::get('/kode-surat/add', [KodeSuratController::class, 'create'])->name('kode_surat.add');
    Route::post('/kode-surat/add', [KodeSuratController::class, 'store'])->name('kode_surat.store');
    Route::get('/kode-surat/edit/{id}', [KodeSuratController::class, 'edit'])->name('kode_surat.edit');
    Route::put('/kode-surat/{id}', [KodeSuratController::class, 'update'])->name('kode_surat.update');
    Route::delete('/kode-surat/{id}', [KodeSuratController::class, 'destroy'])->name('kode_surat.destroy');

    Route::get('/klasifikasi-surat', [KlasifikasiSuratController::class, 'index'])->name('klasifikasi_surat.index');
    Route::get('/klasifikasi-surat/add', [KlasifikasiSuratController::class, 'create'])->name('klasifikasi_surat.add');
    Route::post('/klasifikasi-surat/add', [KlasifikasiSuratController::class, 'store'])->name('klasifikasi_surat.store');
    Route::get('/klasifikasi-surat/edit/{id}', [KlasifikasiSuratController::class, 'edit'])->name('klasifikasi_surat.edit');
    Route::put('/klasifikasi-surat/{id}', [KlasifikasiSuratController::class, 'update'])->name('klasifikasi_surat.update');
    Route::delete('/klasifikasi-surat/{id}', [KlasifikasiSuratController::class, 'destroy'])->name('klasifikasi_surat.destroy');

    Route::get('/asal-surat', [AsalSuratController::class, 'index'])->name('asal_surat.index');
    Route::get('/asal-surat/add', [AsalSuratController::class, 'create'])->name('asal_surat.add');
    Route::post('/asal-surat/add', [AsalSuratController::class, 'store'])->name('asal_surat.store');
    Route::get('/asal-surat/edit/{id}', [AsalSuratController::class, 'edit'])->name('asal_surat.edit');
    Route::put('/asal-surat/{id}', [AsalSuratController::class, 'update'])->name('asal_surat.update');
    Route::delete('/asal-surat/{id}', [AsalSuratController::class, 'destroy'])->name('asal_surat.destroy');

    Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
    Route::get('/informasi/create', [InformasiController::class, 'create'])->name('informasi.create');
    Route::post('/informasi', [InformasiController::class, 'store'])->name('informasi.store');
    Route::get('/informasi/edit/{id}', [InformasiController::class, 'edit'])->name('informasi.edit');
    Route::put('/informasi/{id}', [InformasiController::class, 'update'])->name('informasi.update');
    Route::delete('/informasi/{id}', [InformasiController::class, 'destroy'])->name('informasi.destroy');

    Route::get('/skoring', [SkoringController::class, 'index'])->name('skoring.index');
    Route::get('/skoring/create', [SkoringController::class, 'create'])->name('skoring.create');
    Route::post('/skoring', [SkoringController::class, 'store'])->name('skoring.store');
    Route::get('/skoring/edit/{id}', [SkoringController::class, 'edit'])->name('skoring.edit');
    Route::put('/skoring/{id}', [SkoringController::class, 'update'])->name('skoring.update');
    Route::delete('/skoring/{id}', [SkoringController::class, 'destroy'])->name('skoring.destroy');

    Route::get('/arsip-perencanaan', [ArsipPerencanaanController::class, 'index'])->name('arsip_perencanaan.index');
    Route::get('/arsip-perencanaan/create', [ArsipPerencanaanController::class, 'create'])->name('arsip_perencanaan.create');
    Route::post('/arsip-perencanaan', [ArsipPerencanaanController::class, 'store'])->name('arsip_perencanaan.store');
    Route::get('/arsip-perencanaan/edit/{id}', [ArsipPerencanaanController::class, 'edit'])->name('arsip_perencanaan.edit');
    Route::put('/arsip-perencanaan/{id}', [ArsipPerencanaanController::class, 'update'])->name('arsip_perencanaan.update');
    Route::delete('/arsip-perencanaan/{id}', [ArsipPerencanaanController::class, 'destroy'])->name('arsip_perencanaan.destroy');
    Route::delete('/arsip-perencanaan/{id}/file', [ArsipPerencanaanController::class, 'deleteFile'])->name('arsip_perencanaan.delete_file');
    Route::get('/arsip-perencanaan/{id}/download', [ArsipPerencanaanController::class, 'downloadFile'])->name('arsip_perencanaan.download');

    // Surat Masuk Perencanaan routes
    Route::get('/surat-masuk-perencanaan', [SuratMasukPerencanaanController::class, 'index'])->name('surat_masuk_perencanaan.index');
    Route::get('/surat-masuk-perencanaan/create', [SuratMasukPerencanaanController::class, 'create'])->name('surat_masuk_perencanaan.create');
    Route::post('/surat-masuk-perencanaan', [SuratMasukPerencanaanController::class, 'store'])->name('surat_masuk_perencanaan.store');
    Route::get('/surat-masuk-perencanaan/{id}/edit', [SuratMasukPerencanaanController::class, 'edit'])->name('surat_masuk_perencanaan.edit');
    Route::put('/surat-masuk-perencanaan/{id}', [SuratMasukPerencanaanController::class, 'update'])->name('surat_masuk_perencanaan.update');
    Route::delete('/surat-masuk-perencanaan/{id}', [SuratMasukPerencanaanController::class, 'destroy'])->name('surat_masuk_perencanaan.destroy');
    Route::get('/surat-masuk-perencanaan/{id}/file/delete', [SuratMasukPerencanaanController::class, 'deleteFile'])->name('surat_masuk_perencanaan.delete_file');
    Route::get('/surat-masuk-perencanaan/{id}/keterangan/delete', [SuratMasukPerencanaanController::class, 'deleteKeteranganFile'])->name('surat_masuk_perencanaan.delete_keterangan_file');
    Route::get('/surat-masuk-perencanaan/{id}/arsip/delete', [SuratMasukPerencanaanController::class, 'deleteArsipFile'])->name('surat_masuk_perencanaan.delete_arsip_file');
    
    // Format seperti yang diminta: Route::get('foto/{id}/{jenis}/delete', ...)
    Route::get('/surat-masuk-perencanaan/{id}/{jenis}/delete', [SuratMasukPerencanaanController::class, 'deleteFileByJenis'])->name('surat_masuk_perencanaan.delete_file_by_jenis');
    Route::get('/surat-masuk-perencanaan/{id}/download', [SuratMasukPerencanaanController::class, 'downloadFile'])->name('surat_masuk_perencanaan.download');
    Route::get('/surat-masuk-perencanaan/{id}/download-arsip', [SuratMasukPerencanaanController::class, 'downloadArsipFile'])->name('surat_masuk_perencanaan.download_arsip');
    
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('admin.dashboard.index');
    }
    return redirect('/login');
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
