@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Administrasi</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.informasi.index') }}">Daftar Informasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Informasi</li>
        </ol>
        <h4 class="main-title mb-0">Tambah Informasi</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.informasi.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <label for="judul" class="form-label" style="width: 150px;">Judul:</label>
                        <div class="d-flex align-items-center gap-2">
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                   id="judul" name="judul" value="{{ old('judul') }}" 
                                   style="width: 500px;" required>
                            <span class="text-danger">*</span>
                        </div>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <label for="keterangan" class="form-label" style="width: 150px;">Keterangan:</label>
                        <div class="d-flex align-items-center gap-2">
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                                      id="keterangan" name="keterangan" rows="4" 
                                      style="width: 500px;" required>{{ old('keterangan') }}</textarea>
                            <span class="text-danger">*</span>
                        </div>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-success">
                    <i class="ri-save-line"></i> Simpan
                </button>
                <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">
                    <i class="ri-arrow-left-line"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>
@endpush
