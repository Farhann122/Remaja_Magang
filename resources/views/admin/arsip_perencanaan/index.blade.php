@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <div>
        <ol class="breadcrumb fs-sm mb-1 ">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Arsip Perencanaan</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Arsip Perencanaan</h4>
    </div>
    <div>
        <a href="{{ route('admin.arsip_perencanaan.create') }}" class="btn btn-success">
            <i class="ri-pencil-line"></i> Tambah Arsip Perencanaan
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
                        <th scope="col" class="p-1 text-center" style="width: 10%;">Tahun</th>
                        <th scope="col" class="p-1 text-center" style="width: 50%;">Judul</th>
                        <th scope="col" class="p-1 text-center" style="width: 20%;">File</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($arsipPerencanaan as $index => $arsip)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $arsip->tahun }}</td>
                            <td>{{ $arsip->judul }}</td>
                            <td class="text-center">
                                @if($arsip->file_name)
                                    <a href="{{ route('admin.arsip_perencanaan.download', $arsip->id) }}" 
                                       class="btn btn-sm btn-info" target="_blank">
                                        <i class="ri-eye-line"></i> VIEW
                                    </a>
                                    <br>
                                    <small class="text-muted">{{ $arsip->file_name }}</small>
                                    <br>
                                    <small class="text-muted">{{ number_format($arsip->file_size / 1024, 2) }} KB</small>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.arsip_perencanaan.edit', $arsip->id) }}" class="btn btn-primary btn-sm">
                                    <i class="ri-edit-2-line"></i> Edit
                                </a>
                                <form action="{{ route('admin.arsip_perencanaan.destroy', $arsip->id) }}" method="POST" style="display: inline-block" class="form-hapus">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-hapus">
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


        // Use event delegation for dynamically loaded content
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
