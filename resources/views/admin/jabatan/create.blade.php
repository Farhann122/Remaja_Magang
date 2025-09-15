@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Daftar SDM</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.jabatan.index') }}">Daftar Jabatan</a></li>
            </ol>
            <h4 class="main-title mb-0">Tambah Jabatan</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <form action="{{ route('admin.jabatan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="mb-4 d-flex align-items-start gap-1">
                        <label for="jabatan" class="form-label fw-bold" style="width: 100px; margin-top: 8px;">Jabatan</label>
                        <div class="d-flex flex-row gap-2">
                            <input required type="text" class="form-control" id="jabatan" name="jabatan"
                                placeholder="Masukan Nama Jabatan" value="" style="width: 300px;">
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>
                    </div>

                    <div class="mb-4 d-flex align-items-start gap-1">
                        <label for="peran" class="form-label fw-bold" style="width: 100px; margin-top: 8px;">Peran</label>
                        <div class="d-flex flex-row gap-2">
                            <input required type="text" class="form-control" id="peran" name="peran"
                                placeholder="Masukan Peran Jabatan" value="" style="width: 300px;">
                            <font style="color: red; display: flex; align-items: center; padding: 0;">*</font>
                        </div>
                    </div>

                    <div class="mt-4">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
