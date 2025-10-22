@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Pengaturan</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.konten_setting.index') }}">Konten Setting</a></li>
        </ol>
        <h4 class="main-title mb-0">Edit Konten Setting</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.konten_setting.update', $setting->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label fw-bold">Nama</label>
                <input required type="text" class="form-control" id="nama" name="nama" value="{{ $setting->nama }}">
            </div>

            <div class="mb-3">
                <label for="nilai" class="form-label fw-bold">Nilai</label>
                <input type="text" class="form-control" id="nilai" name="nilai" value="{{ $setting->nilai }}">
            </div>

            <div class="mb-3">
                <label for="tipe" class="form-label fw-bold">Tipe</label>
                <input required type="text" class="form-control" id="tipe" name="tipe" value="{{ $setting->tipe }}">
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
</div>
@endsection
