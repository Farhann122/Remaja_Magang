@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.publikasi.index') }}">Publikasi</a></li>
        </ol>
        <h4 class="main-title mb-0">Edit Publikasi</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.publikasi.update', $publikasi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label fw-bold">Judul</label>
                <input required type="text" class="form-control" id="judul" name="judul"
                       value="{{ $publikasi->judul }}">
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $publikasi->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label for="file_publikasi_uri" class="form-label fw-bold">File Publikasi URI</label>
                <input type="text" class="form-control" id="file_publikasi_uri" name="file_publikasi_uri"
                       value="{{ $publikasi->file_publikasi_uri }}">
            </div>

            <div class="mb-3">
                <label for="cover_uri" class="form-label fw-bold">Cover URI</label>
                <input type="text" class="form-control" id="cover_uri" name="cover_uri"
                       value="{{ $publikasi->cover_uri }}">
            </div>

            <div class="mb-3">
                <label for="status_publikasi" class="form-label fw-bold">Status Publikasi</label>
                <select class="form-select" id="status_publikasi" name="status_publikasi">
                    <option value="1" {{ $publikasi->status_publikasi == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $publikasi->status_publikasi == 0 ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
</div>
@endsection
