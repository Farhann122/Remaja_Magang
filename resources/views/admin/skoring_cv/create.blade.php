@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Skoring</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.skoring_cv.index') }}">Daftar Skoring CV</a></li>
        </ol>
        <h4 class="main-title mb-0">Tambah Skoring CV</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.skoring_cv.store') }}" method="POST">
            @csrf

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="id_kegiatan" class="form-label fw-bold" style="width:150px; margin-top:8px;">Kegiatan</label>
                <div class="d-flex flex-row gap-2">
                    <select name="id_kegiatan" id="id_kegiatan" class="form-select" style="width:500px;" required>
                        <option value="">-- Pilih Kegiatan --</option>
                        @foreach($kegiatan as $k)
                            <option value="{{ $k->id }}">{{ $k->kegiatan }}</option>
                        @endforeach
                    </select>
                    <font style="color:red;">*</font>
                </div>
            </div>

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="id_tingkat" class="form-label fw-bold" style="width:150px; margin-top:8px;">Tingkat</label>
                <div class="d-flex flex-row gap-2">
                    <select name="id_tingkat" id="id_tingkat" class="form-select" style="width:500px;" required>
                        <option value="">-- Pilih Tingkat --</option>
                        @foreach($tingkat as $t)
                            <option value="{{ $t->id }}">{{ $t->tingkat }}</option>
                        @endforeach
                    </select>
                    <font style="color:red;">*</font>
                </div>
            </div>

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="id_partisipasi" class="form-label fw-bold" style="width:150px; margin-top:8px;">Partisipasi</label>
                <div class="d-flex flex-row gap-2">
                    <select name="id_partisipasi" id="id_partisipasi" class="form-select" style="width:500px;" required>
                        <option value="">-- Pilih Partisipasi --</option>
                        @foreach($partisipasi as $p)
                            <option value="{{ $p->id }}">{{ $p->partisipasi }}</option>
                        @endforeach
                    </select>
                    <font style="color:red;">*</font>
                </div>
            </div>

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="deskripsi" class="form-label fw-bold" style="width:150px; margin-top:8px;">Deskripsi</label>
                <div class="d-flex flex-row gap-2">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi" style="width:500px;">
                </div>
            </div>

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="skor" class="form-label fw-bold" style="width:150px; margin-top:8px;">Skor</label>
                <div class="d-flex flex-row gap-2">
                    <input type="number" class="form-control" id="skor" name="skor" placeholder="Masukkan Skor" style="width:500px;" required>
                    <font style="color:red;">*</font>
                </div>
            </div>

            <input type="submit" value="Simpan" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
