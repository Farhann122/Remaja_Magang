@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Manajemen Konten</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.poster.index') }}">Daftar Poster</a></li>
        </ol>
        <h4 class="main-title mb-0">Edit Poster</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.poster.update', $poster->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Judul Poster <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                       value="{{ old('judul', $poster->judul) }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $poster->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">File Poster</label>
                <div class="mb-2">
                    @if($poster->file_name)
                        <a href="{{ asset('storage/' . $poster->file_name) }}" target="_blank" class="btn btn-sm btn-info">
                            Lihat File Lama
                        </a>
                    @else
                        <span class="text-muted">Tidak ada file</span>
                    @endif
                </div>
                <input type="file" name="file" accept=".jpg,.jpeg,.png,.pdf" class="form-control @error('file') is-invalid @enderror">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti file.</small>
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="status_publikasi" value="1"
                       id="status_publikasi" {{ old('status_publikasi', $poster->status_publikasi) ? 'checked' : '' }}>
                <label class="form-check-label" for="status_publikasi">Publikasikan Poster</label>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('admin.poster.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
