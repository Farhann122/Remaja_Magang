<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakController;
use App\Http\Controllers\BastController;
use App\Http\Controllers\RapatController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\SkoringController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\AsalSuratController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KodeSuratController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TipeUndanganController;
use App\Http\Controllers\ArsipPerencanaanController;
use App\Http\Controllers\KlasifikasiSuratController;
use App\Http\Controllers\SuratMasukPerencanaanController;
use App\Http\Controllers\DaftarHadirController;
use App\Http\Controllers\RekapitulasiController;






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
    
    // route paripurna
    Route::get('/rapat', [RapatController::class, 'index'])->name('rapat.index');
    Route::get('/rapat/add', [RapatController::class, 'create'])->name('rapat.add');
    Route::post('/rapat/add', [RapatController::class, 'store'])->name('rapat.store');
    Route::get('/rapat/edit/{id}', [RapatController::class, 'edit'])->name('rapat.edit');
    Route::put('/rapat/{id}', [RapatController::class, 'update'])->name('rapat.update');
    Route::delete('/rapat/{id}', [RapatController::class, 'destroy'])->name('rapat.destroy');

    // route instansi
    Route::get('/instansi', [InstansiController::class, 'index'])->name('instansi.index');
    Route::get('/instansi/add', [InstansiController::class, 'create'])->name('instansi.add');
    Route::post('/instansi/add', [InstansiController::class, 'store'])->name('instansi.store');
    Route::get('/instansi/edit/{id}', [InstansiController::class, 'edit'])->name('instansi.edit');
    Route::put('/instansi/{id}', [InstansiController::class, 'update'])->name('instansi.update');
    Route::delete('/instansi/{id}', [InstansiController::class, 'destroy'])->name('instansi.destroy');

    // route pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/pengguna/add', [PenggunaController::class, 'create'])->name('pengguna.add');
    Route::post('/pengguna/add', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/show/{id}', [PenggunaController::class, 'show'])->name('pengguna.show');
    Route::get('/pengguna/edit/{id}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');

    // Route bast
    Route::get('/bast', [BastController::class, 'index'])->name('bast.index');
    Route::get('/bast/add', [BastController::class, 'create'])->name('bast.add');
    Route::post('/bast/add', [BastController::class, 'store'])->name('bast.store');
    Route::get('/bast/edit/{id}', [BastController::class, 'edit'])->name('bast.edit');
    Route::put('/bast/{id}', [BastController::class, 'update'])->name('bast.update');
    Route::delete('/bast/{id}', [BastController::class, 'destroy'])->name('bast.destroy');
    Route::post('bast/{id}/store-bahan', [App\Http\Controllers\BastController::class, 'storeBahan'])->name('bast.storeBahan');
    Route::resource('bast', App\Http\Controllers\BastController::class)->except(['show']);
    Route::get('bast/bahan/{bahan_id}/data', [App\Http\Controllers\BastController::class, 'getBahanData'])->name('bast.getBahanData');
    Route::post('bast/bahan/{bahan_id}/update', [App\Http\Controllers\BastController::class, 'updateBahan'])->name('bast.updateBahan');
    Route::delete('bast/bahan/{bahan_id}', [App\Http\Controllers\BastController::class, 'destroyBahan'])->name('bast.destroyBahan');
    

    // route undangan
    Route::get('/undangan', [UndanganController::class, 'index'])->name('undangan.index');
    Route::get('/undangan/add', [UndanganController::class, 'create'])->name('undangan.add');
    Route::post('/undangan/add', [UndanganController::class, 'store'])->name('undangan.store');
    Route::get('/undangan/show/{id}', [UndanganController::class, 'show'])->name('undangan.show');
    Route::get('/undangan/edit/{id}', [UndanganController::class, 'edit'])->name('undangan.edit');
    Route::put('/undangan/{id}', [UndanganController::class, 'update'])->name('undangan.update');
    Route::delete('/undangan/{id}', [UndanganController::class, 'destroy'])->name('undangan.destroy');

    //route tipe undangan
    Route::get('/tipe-undangan', [TipeUndanganController::class, 'index'])->name('tipe_undangan.index');
    Route::get('/tipe-undangan/add', [TipeUndanganController::class, 'create'])->name('tipe_undangan.add');
    Route::post('/tipe-undangan/add', [TipeUndanganController::class, 'store'])->name('tipe_undangan.store');
    Route::get('/tipe-undangan/edit/{id}', [TipeUndanganController::class, 'edit'])->name('tipe_undangan.edit');
    Route::put('/tipe-undangan/{id}', [TipeUndanganController::class, 'update'])->name('tipe_undangan.update');
    Route::delete('/tipe-undangan/{id}', [TipeUndanganController::class, 'destroy'])->name('tipe_undangan.destroy');

    // Route daftar hadir
    Route::get('/daftar-hadir/sidang-1-pagi', [DaftarHadirController::class, 'indexSidang1Pagi'])->name('daftar_hadir.sidang1_pagi');
    Route::put('/daftar-hadir/{id}/kehadiran', [DaftarHadirController::class, 'storeKehadiran'])->name('daftar_hadir.store_kehadiran');

    // route rekapitulasi
    Route::get('/rekapitulasi/sidang-1', [RekapitulasiController::class, 'indexSidang1'])->name('rekapitulasi.sidang1');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// ubah route index menajdi welcome.blade.php
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/login', function () {
//     if (Auth::check()) {
//         return redirect()->route('admin.dashboard.index');
//     }
//     return redirect('/login');
// });
// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
