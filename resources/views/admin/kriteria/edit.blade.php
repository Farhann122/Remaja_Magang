@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Skoring</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.kriteria.index') }}">Daftar Kriteria</a></li>
        </ol>
        <h4 class="main-title mb-0">Edit Kriteria</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.kriteria.update', $kriteria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="kriteria" class="form-label fw-bold" style="width:150px; margin-top:8px;">Kriteria</label>
                <div class="d-flex flex-row gap-2">
                    <input type="text" required class="form-control" id="kriteria" name="kriteria" value="{{ $kriteria->kriteria }}" placeholder="Masukkan Nama Kriteria" style="width:400px;">
                    <font style="color:red;">*</font>
                </div>
            </div>

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="bobot" class="form-label fw-bold" style="width:150px; margin-top:8px;">Bobot</label>
                <div class="d-flex flex-row gap-2">
                    <input type="number" required class="form-control" id="bobot" name="bobot" value="{{ $kriteria->bobot }}" placeholder="Masukkan Bobot (0 - 100)" style="width:200px;">
                    <font style="color:red;">*</font>
                </div>
            </div>

            <input type="submit" value="Simpan Perubahan" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
