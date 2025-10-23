@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Manajemen Konten</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.poster.index') }}">Daftar Poster</a></li>
        </ol>
        <h4 class="main-title mb-0">Tambah Poster</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.poster.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Judul Poster <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                       value="{{ old('judul') }}" placeholder="Masukkan judul poster" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi (opsional)">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">File Poster <span class="text-danger">*</span></label>
                <input type="file" name="file" accept=".jpg,.jpeg,.png,.pdf" class="form-control @error('file') is-invalid @enderror" required>
                <small class="text-muted">Format yang diizinkan: JPG, PNG, atau PDF. Maksimal 2MB.</small>
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="status_publikasi" value="1" id="status_publikasi" {{ old('status_publikasi') ? 'checked' : '' }}>
                <label class="form-check-label" for="status_publikasi">Publikasikan Poster</label>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.poster.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
