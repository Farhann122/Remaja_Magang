@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.kegiatan.index') }}">Daftar Kegiatan</a></li>
        </ol>
        <h4 class="main-title mb-0">Edit Kegiatan</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.kegiatan.update', $kegiatan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="kegiatan" class="form-label fw-bold" style="width:150px; margin-top:8px;">Kegiatan</label>
                <div class="d-flex flex-row gap-2">
                    <input type="text" name="kegiatan" id="kegiatan"
                        class="form-control @error('kegiatan') is-invalid @enderror"
                        value="{{ old('kegiatan', $kegiatan->kegiatan) }}" style="width:500px;" required>
                    <span class="text-danger">*</span>
                </div>
                @error('kegiatan')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('admin.kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
