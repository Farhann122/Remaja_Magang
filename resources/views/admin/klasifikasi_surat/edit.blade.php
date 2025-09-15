@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.klasifikasi_surat.index') }}">Daftar Klasifikasi Surat</a></li>
        </ol>
        <h4 class="main-title mb-0">Edit Klasifikasi Surat</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <form action="{{ route('admin.klasifikasi_surat.update', $klasifikasiSurat->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4 d-flex align-items-start gap-2">
                    <label for="klasifikasi_surat" class="form-label fw-bold" style="width: 150px; margin-top: 8px;">Klasifikasi Surat</label>
                    <div class="d-flex flex-row gap-2">
                        <input required type="text" class="form-control" id="klasifikasi_surat" name="klasifikasi_surat"
                            placeholder="Masukan Klasifikasi Surat" value="{{ $klasifikasiSurat->klasifikasi_surat }}" style="width: 500px;">
                        <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                    </div>
                </div>

                <input type="submit" value="Simpan Perubahan" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Show success/error messages with SweetAlert2
    @if(session('success'))
        console.log('Success message:', '{{ session('success') }}');
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif

    @if(session('error'))
        console.log('Error message:', '{{ session('error') }}');
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
