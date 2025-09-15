@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <div>
        <ol class="breadcrumb fs-sm mb-1 ">
            <li class="breadcrumb-item">Data Administrasi</li>
            <li class="breadcrumb-item active" aria-current="page">Daftar MAK</li>
        </ol>
        <h4 class="main-title mb-0">Daftar MAK</h4>
    </div>
    <div>
        <a href="{{ route('admin.mak.add') }}" class="btn btn-success">
            <i class="ri-pencil-line"></i> Tambah MAK
        </a>
    </div>
</div>

<div class="card ">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="p-1 text-center" style="width: 5%;">No</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">Kode MAK</th>
                        <th scope="col" class="p-1 text-center" style="width: 25%;">Nama MAK</th>
                        <th scope="col" class="p-1 text-center" style="width: 35%;">Keterangan MAK</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">Contoh MAK</th>
                        <th scope="col" class="p-1 text-center" style="width: 5%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($maks as $mak)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $mak->kode_mak }}</td>
                            <td>{{ $mak->nama_mak }}</td>
                            <td>{{ Str::limit($mak->keterangan_mak, 100) }}</td>
                            <td>{{ Str::limit($mak->contoh_mak, 50) }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.mak.edit', $mak->id) }}" class="btn btn-primary">
                                    <i class="ri-edit-2-line"></i> Edit
                                </a>
                                <form action="{{ route('admin.mak.destroy', $mak->id) }}" method="POST" style="display: inline-block" class="form-hapus">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-hapus">
                                        <i class="ri-delete-bin-line"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-hapus', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
