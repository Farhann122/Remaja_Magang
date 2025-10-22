@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Skoring</li>
            <li class="breadcrumb-item active">Daftar Skoring CV</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Skoring CV</h4>
    </div>
    <div>
        <a href="{{ route('admin.skoring_cv.create') }}" class="btn btn-success">
            <i class="ri-add-line"></i> Tambah Skoring CV
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Tingkat</th>
                        <th>Partisipasi</th>
                        <th>Deskripsi</th>
                        <th>Skor</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skoringCv as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->kegiatan->kegiatan ?? '-' }}</td>
                        <td>{{ $item->tingkat->tingkat ?? '-' }}</td>
                        <td>{{ $item->partisipasi->partisipasi ?? '-' }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td class="text-center">{{ $item->skor }}</td>
                        <td class="text-center">
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('admin.skoring_cv.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                    <i class="ri-edit-line"></i> Edit
                                </a>
                                <form action="{{ route('admin.skoring_cv.destroy', $item->id) }}" method="POST" class="form-hapus d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger btn-hapus">
                                        <i class="ri-delete-bin-line"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada data Skoring CV.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    // Pastikan DataTable hanya diinisialisasi sekali
    if (!$.fn.DataTable.isDataTable('#datatable')) {
        $('#datatable').DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/id.json'
            }
        });
    }

    // SweetAlert konfirmasi hapus
    $(document).on('click', '.btn-hapus', function (e) {
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
