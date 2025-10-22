@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Skoring</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.skoring.index') }}">Daftar Skoring</a></li>
        </ol>
        <h4 class="main-title mb-0">Edit Skoring</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.skoring.update', $skoring->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Dropdown Kriteria --}}
            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="id_kriteria" class="form-label fw-bold" style="width:150px; margin-top:8px;">Kriteria</label>
                <div class="d-flex flex-row gap-2">
                    <select required class="form-select" id="id_kriteria" name="id_kriteria" style="width:500px;">
                        <option value="">-- Pilih Kriteria --</option>
                        @foreach ($kriteria as $item)
                            <option value="{{ $item->id }}" {{ $skoring->id_kriteria == $item->id ? 'selected' : '' }}>
                                {{ $item->kriteria }}
                            </option>
                        @endforeach
                    </select>
                    <font style="color:red;">*</font>
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="deskripsi" class="form-label fw-bold" style="width:150px; margin-top:8px;">Deskripsi</label>
                <div class="d-flex flex-row gap-2">
                    <input required type="text" class="form-control" id="deskripsi" name="deskripsi"
                        value="{{ $skoring->deskripsi }}" style="width:500px;">
                    <font style="color:red;">*</font>
                </div>
            </div>

            {{-- Bobot --}}
            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="bobot" class="form-label fw-bold" style="width:150px; margin-top:8px;">Bobot</label>
                <div class="d-flex flex-row gap-2">
                    <input required type="number" class="form-control" id="bobot" name="bobot"
                        value="{{ $skoring->bobot }}" style="width:500px;">
                    <font style="color:red;">*</font>
                </div>
            </div>

            <input type="submit" value="Simpan Perubahan" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
