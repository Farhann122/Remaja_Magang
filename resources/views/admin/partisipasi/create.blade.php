@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.partisipasi.index') }}">Daftar Partisipasi</a></li>
        </ol>
        <h4 class="main-title mb-0">Tambah Partisipasi</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.partisipasi.store') }}" method="POST">
            @csrf

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="partisipasi" class="form-label fw-bold" style="width: 150px; margin-top: 8px;">Partisipasi</label>
                <div class="d-flex flex-row gap-2">
                    <input required type="text" class="form-control" id="partisipasi" name="partisipasi"
                        placeholder="Masukkan Partisipasi" style="width: 500px;">
                    <font style="color: red; display: flex; align-items: center;">*</font>
                </div>
            </div>

            <input type="submit" value="Simpan" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
