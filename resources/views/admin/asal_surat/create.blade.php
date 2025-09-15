@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.asal_surat.index') }}">Daftar Asal/Tujuan Surat</a></li>
        </ol>
        <h4 class="main-title mb-0">Tambah Asal/Tujuan Surat</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <form action="{{ route('admin.asal_surat.store') }}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-4 d-flex align-items-start gap-2">
                    <label for="asal_surat" class="form-label fw-bold" style="width: 150px; margin-top: 8px;">Asal/Tujuan Surat</label>
                    <div class="d-flex flex-row gap-2">
                        <input required type="text" class="form-control" id="asal_surat" name="asal_surat"
                            placeholder="Masukan Asal/Tujuan Surat" value="" style="width: 500px;">
                        <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                    </div>
                </div>

                <input type="submit" value="Simpan" class="btn btn-primary">
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
