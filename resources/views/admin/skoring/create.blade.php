@extends('layouts.app')

@php
use App\Models\Barang;
@endphp

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <div>
        <ol class="breadcrumb fs-sm mb-1 ">
            <li class="breadcrumb-item">Pembuatan TOR</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.skoring.index') }}">Daftar Skoring</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Skoring</li>
        </ol>
        <h4 class="main-title mb-0">Tambah Skoring</h4>
    </div>
</div>

<div class="card ">
    <div class="card-body">
        <form action="{{ route('admin.skoring.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="operator" class="form-label">Operator:</label>
                </div>
                <div class="col-md-4">
                    <select class="form-select @error('operator') is-invalid @enderror" 
                            id="operator" name="operator" required>
                        <option value="">Pilih Data</option>
                        <option value="<" {{ old('operator') == '<' ? 'selected' : '' }}>&lt;</option>
                        <option value="<=" {{ old('operator') == '<=' ? 'selected' : '' }}>&lt;=</option>
                        <option value="=" {{ old('operator') == '=' ? 'selected' : '' }}>=</option>
                        <option value=">=" {{ old('operator') == '>=' ? 'selected' : '' }}>&gt;=</option>
                        <option value=">" {{ old('operator') == '>' ? 'selected' : '' }}>&gt;</option>
                    </select>
                    @error('operator')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-1">
                    <span class="text-danger">*</span>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="harga_satuan" class="form-label">Harga Satuan:</label>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control @error('harga_satuan') is-invalid @enderror"
                               id="harga_satuan" name="harga_satuan" value="{{ old('harga_satuan') }}" required>
                    </div>
                    @error('harga_satuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-1">
                    <span class="text-danger">*</span>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="kategori" class="form-label">Kategori:</label>
                </div>
                <div class="col-md-4">
                    <select class="form-select @error('kategori') is-invalid @enderror" 
                            id="kategori" name="kategori" required>
                        <option value="">Pilih Data...</option>
                        <option value="1" {{ old('kategori') == '1' ? 'selected' : '' }}>Belanja Modal</option>
                        <option value="2" {{ old('kategori') == '2' ? 'selected' : '' }}>Belanja Barang</option>
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-1">
                    <span class="text-danger">*</span>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="umur_ekonomis" class="form-label">Umur Ekonomis:</label>
                </div>
                <div class="col-md-4">
                    <select class="form-select @error('umur_ekonomis') is-invalid @enderror" 
                            id="umur_ekonomis" name="umur_ekonomis" required>
                        <option value="">Pilih Data...</option>
                        @foreach(Barang::$umurEkonomis as $key => $value)
                            <option value="{{ $key }}" {{ old('umur_ekonomis') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('umur_ekonomis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-1">
                    <span class="text-danger">*</span>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="jenis_barang" class="form-label">Jenis Barang:</label>
                </div>
                <div class="col-md-4">
                    <select class="form-select @error('jenis_barang') is-invalid @enderror" 
                            id="jenis_barang" name="jenis_barang" required>
                        <option value="">Pilih Data...</option>
                        @foreach(Barang::$jenisBarang as $key => $value)
                            <option value="{{ $key }}" {{ old('jenis_barang') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('jenis_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-1">
                    <span class="text-danger">*</span>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="sifat_barang" class="form-label">Sifat Barang:</label>
                </div>
                <div class="col-md-4">
                    <select class="form-select @error('sifat_barang') is-invalid @enderror" 
                            id="sifat_barang" name="sifat_barang" required>
                        <option value="">Pilih Data...</option>
                        @foreach(Barang::$sifatBarang as $key => $value)
                            <option value="{{ $key }}" {{ old('sifat_barang') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('sifat_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-1">
                    <span class="text-danger">*</span>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="keterangan" class="form-label">Keterangan:</label>
                </div>
                <div class="col-md-4">
                    <select class="form-select @error('keterangan') is-invalid @enderror" 
                            id="keterangan" name="keterangan" required>
                        <option value="">Pilih Data...</option>
                        @foreach(Barang::$keterangan as $key => $value)
                            <option value="{{ $key }}" {{ old('keterangan') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-1">
                    <span class="text-danger">*</span>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="ri-save-line"></i> Simpan
                    </button>
                    <a href="{{ route('admin.skoring.index') }}" class="btn btn-secondary">
                        <i class="ri-arrow-left-line"></i> Kembali
                    </a>
                </div>
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
    });
</script>
@endpush
