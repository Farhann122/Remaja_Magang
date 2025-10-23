@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.publikasi.index') }}">Publikasi</a></li>
        </ol>
        <h4 class="main-title mb-0">Tambah Publikasi</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.publikasi.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="judul" class="form-label fw-bold">Judul</label>
                <input required type="text" class="form-control" id="judul" name="judul"
                       placeholder="Masukkan judul publikasi" value="{{ old('judul') }}">
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                          placeholder="Masukkan deskripsi">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="file_publikasi_uri" class="form-label fw-bold">File Publikasi URI</label>
                <input type="text" class="form-control" id="file_publikasi_uri" name="file_publikasi_uri"
                       placeholder="Masukkan URL file publikasi" value="{{ old('file_publikasi_uri') }}">
            </div>

            <div class="mb-3">
                <label for="cover_uri" class="form-label fw-bold">Cover URI</label>
                <input type="text" class="form-control" id="cover_uri" name="cover_uri"
                       placeholder="Masukkan URL cover" value="{{ old('cover_uri') }}">
            </div>

            <div class="mb-3">
                <label for="status_publikasi" class="form-label fw-bold">Status Publikasi</label>
                <select class="form-select" id="status_publikasi" name="status_publikasi">
                    <option value="1" selected>Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
