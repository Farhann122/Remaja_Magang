@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Galeri</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.album_foto.index') }}">Album Foto</a></li>
        </ol>
        <h4 class="main-title mb-0">Tambah Album Foto</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.album_foto.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                <input required type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}">
            </div>

            <div class="mb-4">
                <label for="album_foto" class="form-label fw-bold">Nama Album</label>
                <input required type="text" class="form-control" name="album_foto" placeholder="Masukkan nama album" value="{{ old('album_foto') }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
