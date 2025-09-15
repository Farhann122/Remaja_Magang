@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tambah Arsip Perencanaan</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.arsip_perencanaan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="tahun" class="form-label">Tahun:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control @error('tahun') is-invalid @enderror" 
                                               id="tahun" name="tahun" value="{{ old('tahun') }}" 
                                               maxlength="4" pattern="\d{4}" inputmode="numeric" required>
                                        @error('tahun')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-1">
                                        <span class="text-danger">*</span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="judul" class="form-label">Judul:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                               id="judul" name="judul" value="{{ old('judul') }}" 
                                               placeholder="Masukkan judul arsip" required>
                                        @error('judul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-1">
                                        <span class="text-danger">*</span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="file" class="form-label">Upload File:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control @error('file') is-invalid @enderror" 
                                               id="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx" required>
                                        <div class="form-text">Format yang diperbolehkan: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX (Maksimal 10MB)</div>
                                        @error('file')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-1">
                                        <span class="text-danger">*</span>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('admin.arsip_perencanaan.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Show success message if exists
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        // Show error message if exists
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
