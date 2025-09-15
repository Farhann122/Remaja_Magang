@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Data Administrasi</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.mak.index') }}">Daftar MAK</a></li>
            </ol>
            <h4 class="main-title mb-0">Edit MAK</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <form action="{{ route('admin.mak.update', $mak->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 d-flex align-items-start gap-3">
                        <label for="kode_mak" class="form-label fw-bold" style="width: 150px; margin-top: 8px;">Kode MAK</label>
                        <div class="d-flex flex-row gap-2">
                            <input required type="text" class="form-control" id="kode_mak" name="kode_mak"
                                placeholder="Masukan Kode MAK" value="{{ $mak->kode_mak }}" maxlength="6" style="width: 500px;">
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>
                    </div>

                    <div class="mb-3 d-flex align-items-start gap-3">
                        <label for="nama_mak" class="form-label fw-bold" style="width: 150px; margin-top: 8px;">Nama MAK</label>
                        <div class="d-flex flex-row gap-2">
                            <textarea required class="form-control" id="nama_mak" name="nama_mak" rows="4"
                                placeholder="Masukan Nama MAK" style="width: 500px;">{{ $mak->nama_mak }}</textarea>
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>
                    </div>

                    <div class="mb-3 d-flex align-items-start gap-3">
                        <label for="keterangan_mak" class="form-label fw-bold" style="width: 150px; margin-top: 8px;">Keterangan MAK</label>
                        <div class="d-flex flex-row gap-2">
                            <textarea required class="form-control" id="keterangan_mak" name="keterangan_mak" rows="4"
                                placeholder="Masukan Keterangan MAK" style="width: 500px;">{{ $mak->keterangan_mak }}</textarea>
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>
                    </div>

                    <div class="mb-3 d-flex align-items-start gap-3">
                        <label for="contoh_mak" class="form-label fw-bold" style="width: 150px; margin-top: 8px;">Contoh MAK</label>
                        <div class="d-flex flex-row gap-2">
                            <textarea required class="form-control" id="contoh_mak" name="contoh_mak" rows="4"
                                placeholder="Masukan Contoh MAK" style="width: 500px;">{{ $mak->contoh_mak }}</textarea>
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>
                    </div>

                    <input type="submit" value="Simpan Perubahan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
