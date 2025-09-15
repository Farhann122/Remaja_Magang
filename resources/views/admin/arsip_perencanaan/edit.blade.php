@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item active" aria-current="page">Edit Arsip Perencanaan</li>
        </ol>
        <h4 class="main-title mb-0">Edit Arsip Perencanaan</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
                    <form action="{{ route('admin.arsip_perencanaan.update', $arsipPerencanaan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="tahun" class="form-label">Tahun:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control @error('tahun') is-invalid @enderror" 
                               id="tahun" name="tahun" value="{{ old('tahun', $arsipPerencanaan->tahun) }}" 
                               maxlength="4" pattern="\d{4}" inputmode="numeric" required>
                        <span class="text-danger ms-2">*</span>
                    </div>
                    @error('tahun')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="judul" class="form-label">Judul:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" value="{{ old('judul', $arsipPerencanaan->judul) }}" 
                               maxlength="255" required>
                        <span class="text-danger ms-2">*</span>
                    </div>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            @if($arsipPerencanaan->file_name)
            <div class="row mb-3 file-display">
                <div class="col-md-2">
                    <label class="form-label">File:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <span class="me-2">
                            {{ $arsipPerencanaan->file_name }} 
                            [{{ number_format($arsipPerencanaan->file_size / 1024, 2) }} KB]
                        </span>
                        <button type="button" class="btn btn-link text-danger p-0 btn-delete-file" 
                                data-url="{{ route('admin.arsip_perencanaan.delete_file', $arsipPerencanaan->id) }}">
                            [DELETE]
                        </button>
                    </div>
                </div>
            </div>
            @endif

            <!-- Upload file section - always present but hidden if file exists -->
            <div class="row mb-3" id="upload-section" style="{{ $arsipPerencanaan->file_name ? 'display: none;' : '' }}">
                <div class="col-md-2">
                    <label for="file" class="form-label">Upload File:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <input type="file" class="form-control @error('file') is-invalid @enderror" 
                               id="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx">
                    </div>
                    <div class="form-text">Format yang diperbolehkan: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX (Maksimal 10MB)</div>
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.arsip_perencanaan.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
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

        // Delete file confirmation
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-delete-file')) {
                e.preventDefault();
                const deleteUrl = e.target.dataset.url;
                
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
                        fetch(deleteUrl, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json',
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Berhasil!', data.message, 'success')
                                    .then(() => {
                                        // Hide file display section
                                        const fileDisplay = document.querySelector('.file-display');
                                        if (fileDisplay) {
                                            fileDisplay.style.display = 'none';
                                        }
                                        
                                        // Show upload section
                                        const uploadSection = document.getElementById('upload-section');
                                        if (uploadSection) {
                                            uploadSection.style.display = 'block';
                                        }
                                        // Reset file input
                                        const fileInput = document.getElementById('file');
                                        if (fileInput) {
                                            fileInput.value = '';
                                        }
                                    });
                            } else {
                                Swal.fire('Error!', data.message, 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire('Error!', 'Terjadi kesalahan saat menghapus file!', 'error');
                        });
                    }
                });
            }
        });
    });
</script>
@endpush