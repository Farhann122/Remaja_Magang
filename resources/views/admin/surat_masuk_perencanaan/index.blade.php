@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Surat Masuk Perencanaan</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Surat Masuk Perencanaan</h4>
    </div>
    <div>
        <a href="{{ route('admin.surat_masuk_perencanaan.create') }}" class="btn btn-success">
            <i class="ri-add-line"></i> Tambah Surat Masuk Perencanaan
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Arsip</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Asal Surat</th>
                        <th>Kode Keuangan</th>
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th>Klasifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suratMasukPerencanaan as $index => $surat)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $surat->no_arsip ?? '-' }}</td>
                        <td>{{ $surat->nomor }}</td>
                        <td>{{ \Carbon\Carbon::parse($surat->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $surat->asal_surat ?? '-' }}</td>
                        <td>{{ $surat->kode_keuangan ?? '-' }}</td>
                        <td>{{ Str::limit($surat->judul, 50) }}</td>
                        <td>{{ Str::limit($surat->keterangan, 50) }}</td>
                        <td>{{ $surat->klasifikasi ?? '-' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.surat_masuk_perencanaan.edit', $surat->id) }}" 
                                   class="btn btn-sm btn-warning" title="Edit">
                                    <i class="ri-edit-line"></i> EDIT
                                </a>
                                <form action="{{ route('admin.surat_masuk_perencanaan.destroy', $surat->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger btn-hapus" title="Hapus">
                                        <i class="ri-delete-bin-line"></i> DELETE
                                    </button>
                                </form>
                                @if($surat->file_name)
                                    <a href="{{ route('admin.surat_masuk_perencanaan.download', $surat->id) }}" 
                                       class="btn btn-sm btn-info" title="View/Download Main File">
                                        <i class="ri-eye-line"></i> VIEW
                                    </a>
                                @else
                                    <button type="button" class="btn btn-sm btn-secondary" disabled title="Tidak ada file">
                                        <i class="ri-eye-line"></i> VIEW
                                    </button>
                                @endif
                            </div>
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
        // Initialize DataTable
        if (!$.fn.DataTable.isDataTable('#datatable')) {
            $('#datatable').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
                },
                columnDefs: [
                    { targets: [1, 2, 3, 4, 5, 6, 7, 8], className: 'text-center' },
                    { targets: [9], orderable: false, searchable: false }
                ]
            });
        }

        // Delete confirmation
        $(document).on('click', '.btn-hapus', function(e) {
            e.preventDefault();
            const form = $(this).closest('form');
            
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
