@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Surat Masuk Perencanaan</li>
        </ol>
        <h4 class="main-title mb-0">Tambah Surat Masuk Perencanaan</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ route('admin.surat_masuk_perencanaan.index') }}" class="btn btn-link p-0">
                <i class="ri-arrow-left-line"></i> Back to Daftar Surat Masuk Perencanaan
            </a>
        </div>

        <form action="{{ route('admin.surat_masuk_perencanaan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="nomor" class="form-label">Nomor:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control @error('nomor') is-invalid @enderror" 
                               id="nomor" name="nomor" value="{{ old('nomor') }}" 
                               maxlength="100" required>
                        <span class="text-danger ms-2">*</span>
                    </div>
                    @if($errors->has('nomor'))
                        <div class="invalid-feedback">{{ $errors->first('nomor') }}</div>
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="tanggal" class="form-label">Tanggal:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                               id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                        <span class="text-danger ms-2">*</span>
                    </div>
                    @if($errors->has('tanggal'))
                        <div class="invalid-feedback">{{ $errors->first('tanggal') }}</div>
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="judul" class="form-label">Judul:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" value="{{ old('judul') }}" 
                               maxlength="500" required>
                        <span class="text-danger ms-2">*</span>
                    </div>
                    @if($errors->has('judul'))
                        <div class="invalid-feedback">{{ $errors->first('judul') }}</div>
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="keterangan" class="form-label">Keterangan:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                                  id="keterangan" name="keterangan" rows="3" required>{{ old('keterangan') }}</textarea>
                        <span class="text-danger ms-2">*</span>
                    </div>
                    @if($errors->has('keterangan'))
                        <div class="invalid-feedback">{{ $errors->first('keterangan') }}</div>
                    @endif
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="file" class="form-label">Upload File:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <input type="file" class="form-control @error('file') is-invalid @enderror" 
                               id="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx" required>
                        <button type="button" class="btn btn-link text-danger p-0 ms-2" id="btn-remove-file" style="display: none;">
                            [DELETE]
                        </button>
                        <span class="text-danger ms-2">*</span>
                    </div>
                    <div class="form-text">Format yang diperbolehkan: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX (Maksimal 10MB)</div>
                    @if($errors->has('file'))
                        <div class="invalid-feedback">{{ $errors->first('file') }}</div>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.surat_masuk_perencanaan.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    const fileInput = document.getElementById('file');
    const btnRemoveFile = document.getElementById('btn-remove-file');

    // Show/hide delete button when file is selected
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            btnRemoveFile.style.display = 'inline-block';
        } else {
            btnRemoveFile.style.display = 'none';
        }
    });

    // Remove file when delete button is clicked
    btnRemoveFile.addEventListener('click', function() {
        Swal.fire({
            title: 'Yakin ingin menghapus file?',
            text: 'File yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Clear file input
                fileInput.value = '';
                
                // Hide delete button
                btnRemoveFile.style.display = 'none';
                
                // Show success message
                Swal.fire('Berhasil!', 'File berhasil dihapus!', 'success');
            }
        });
    });
});
</script>
@endpush

