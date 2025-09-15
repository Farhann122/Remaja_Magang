@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Data Administrasi</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.satuan.index') }}">Daftar Satuan</a></li>
            </ol>
            <h4 class="main-title mb-0">Edit Satuan</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <form action="{{ route('admin.satuan.update', $satuan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4 d-flex align-items-start gap-2">
                        <label for="kode_satuan" class="form-label fw-bold" style="width: 100px; margin-top: 8px;">Kode Satuan</label>
                        <div class="d-flex flex-row gap-2">
                            <input required type="text" class="form-control" id="kode_satuan" name="kode_satuan"
                                placeholder="Masukan Kode Satuan" value="{{ $satuan->kode_satuan }}" style="width: 300px;">
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>
                    </div>

                    <div class="mb-4 d-flex align-items-start gap-2">
                        <label for="nama_satuan" class="form-label fw-bold" style="width: 100px; margin-top: 8px;">Nama Satuan</label>
                        <div class="d-flex flex-row gap-2">
                            <input required type="text" class="form-control" id="nama_satuan" name="nama_satuan"
                                placeholder="Masukan Nama Satuan" value="{{ $satuan->nama_satuan }}" style="width: 300px;">
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>
                    </div>

                    <div class="mt-4">
                        <input type="submit" value="Simpan Perubahan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
