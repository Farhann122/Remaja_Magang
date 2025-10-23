@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Manajemen Konten</li>
            <li class="breadcrumb-item active">Daftar Poster</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Poster</h4>
    </div>
    <div>
        <a href="{{ route('admin.poster.create') }}" class="btn btn-success">
            <i class="ri-add-line"></i> Tambah Poster
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>File</th>
                        <th>Status Publikasi</th>
                        <th width="18%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ Str::limit($item->deskripsi, 60) }}</td>
                        <td class="text-center">
                            @if($item->file_name)
                                <a href="{{ asset('storage/' . $item->file_name) }}" target="_blank" class="btn btn-sm btn-info">
                                    Lihat File
                                </a>
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <span class="badge {{ $item->status_publikasi ? 'bg-success' : 'bg-secondary' }}">
                                {{ $item->status_publikasi ? 'Publik' : 'Draft' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.poster.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                    <i class="ri-edit-line"></i> Edit
                                </a>
                                <form action="{{ route('admin.poster.destroy', $item->id) }}" method="POST" class="form-hapus">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger btn-hapus">
                                        <i class="ri-delete-bin-line"></i> Hapus
                                    </button>
                                </form>
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
