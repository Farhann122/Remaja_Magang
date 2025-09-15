@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <div>
        <ol class="breadcrumb fs-sm mb-1 ">
            <li class="breadcrumb-item">Data Administrasi</li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Tahun</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Tahun</h4>
    </div>
    <div>
        <a href="{{ route('admin.tahun.add') }}" class="btn btn-success">
            <i class="ri-pencil-line"></i> Tambah Tahun
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
                        <th scope="col" class="p-1 text-center" style="width: 50%;">Tahun</th>
                        <th scope="col" class="p-1 text-center" style="width: 25%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tahuns as $tahun)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $tahun->tahun }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.tahun.edit', $tahun->id) }}" class="btn btn-primary
">

                                    <i class="ri-edit-2-line"></i> Edit
                                </a>
                                <form action="{{ route('admin.tahun.destroy', $tahun->id) }}" method="POST"
style="display: inline-block" class="form-hapus">

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
        $('.btn-hapus').on('click', function(e) {
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