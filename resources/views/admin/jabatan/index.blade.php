@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <div>
        <ol class="breadcrumb fs-sm mb-1 ">
            <li class="breadcrumb-item">Data SDM</li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Jabatan</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Jabatan</h4>
    </div>
    <div>
        <a href="{{ route('admin.jabatan.add') }}" class="btn btn-success">
            <i class="ri-pencil-line"></i> Tambah Jabatan
        </a>
    </div>
</div>

<div class="card ">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jabatan</th>
                            <th>Peran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jabatan as $index => $jab)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $jab->jabatan }}</td>
                                <td>{{ $jab->peran ?? '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.jabatan.edit', $jab->id) }}" class="btn btn-primary">
                                        <i class="ri-edit-2-line"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.jabatan.destroy', $jab->id) }}" method="POST" style="display: inline-block" class="form-hapus">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-hapus" data-id="{{ $jab->id }}" data-name="{{ $jab->jabatan }}">
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
