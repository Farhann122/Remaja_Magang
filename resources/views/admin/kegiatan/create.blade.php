@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.kegiatan.index') }}">Daftar Kegiatan</a></li>
        </ol>
        <h4 class="main-title mb-0">Tambah Kegiatan</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.kegiatan.store') }}" method="POST">
            @csrf
            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="kegiatan" class="form-label fw-bold" style="width:150px; margin-top:8px;">Kegiatan</label>
                <div class="d-flex flex-row gap-2">
                    <input required type="text" class="form-control" id="kegiatan" name="kegiatan"
                        placeholder="Masukkan Nama Kegiatan" style="width:500px;">
                    <font style="color:red;">*</font>
                </div>
            </div>
            <input type="submit" value="Simpan" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
