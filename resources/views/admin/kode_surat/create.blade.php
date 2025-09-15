@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tambah Kode Surat</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            

                            <form action="{{ route('admin.kode_surat.store') }}" method="POST">
                                @csrf
                                
                                <div class="mb-4 d-flex align-items-start gap-1">
                                    <label for="kode_surat" class="form-label fw-bold" style="width: 100px; margin-top: 8px;">Kode Surat</label>
                                    <div class="d-flex flex-row gap-2">
                                        <input required type="text" class="form-control" id="kode_surat" name="kode_surat"
                                            placeholder="Masukan Kode Surat" value="{{ old('kode_surat') }}" style="width: 300px;">
                                        <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                                    </div>
                                </div>

                                <div class="mb-4 d-flex align-items-start gap-1">
                                    <label for="keterangan" class="form-label fw-bold" style="width: 100px; margin-top: 8px;">Keterangan</label>
                                    <div class="d-flex flex-row gap-2">
                                        <input required type="text" class="form-control" id="keterangan" name="keterangan"
                                            placeholder="Masukan Keterangan" value="{{ old('keterangan') }}" style="width: 300px;">
                                        <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                    <a href="{{ route('admin.kode_surat.index') }}" class="btn btn-secondary">Batal</a>
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
