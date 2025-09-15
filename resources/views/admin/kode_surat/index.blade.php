@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <div>
        <ol class="breadcrumb fs-sm mb-1 ">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Kode Surat</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Kode Surat</h4>
    </div>
    <div>
        <a href="{{ route('admin.kode_surat.add') }}" class="btn btn-success">
            <i class="ri-pencil-line"></i> Tambah Kode Surat
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
                        <th scope="col" class="p-1 text-center" style="width: 25%;">Kode Surat</th>
                        <th scope="col" class="p-1 text-center" style="width: 50%;">Keterangan</th>
                        <th scope="col" class="p-1 text-center" style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kodeSurat as $ks)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $ks->kode_surat }}</td>
                            <td>{{ $ks->keterangan }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.kode_surat.edit', $ks->id) }}" class="btn btn-primary">
                                    <i class="ri-edit-2-line"></i> Edit
                                </a>
                                <form action="{{ route('admin.kode_surat.destroy', $ks->id) }}" method="POST" style="display: inline-block" class="form-hapus">
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
        // Initialize DataTables only if not already initialized
        if (!$.fn.DataTable.isDataTable('#datatable')) {
            $('#datatable').DataTable({
                "responsive": true,
                "autoWidth": false,
                "pageLength": 10,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
                }
            });
        }

        // Show success message if exists
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        // Show error message if exists
        @if(session('error'))
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif

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