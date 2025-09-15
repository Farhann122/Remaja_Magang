@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <div>
        <ol class="breadcrumb fs-sm mb-1 ">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Klasifikasi Surat</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Klasifikasi Surat</h4>
    </div>
    <div>
        <a href="{{ route('admin.klasifikasi_surat.add') }}" class="btn btn-success">
            <i class="ri-pencil-line"></i> Tambah Klasifikasi Surat
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
                        <th scope="col" class="p-1 text-center" style="width: 80%;">Klasifikasi Surat</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($klasifikasiSurat as $index => $ks)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $ks->klasifikasi_surat }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.klasifikasi_surat.edit', $ks->id) }}" class="btn btn-primary">
                                    <i class="ri-edit-2-line"></i> Edit
                                </a>
                                <form action="{{ route('admin.klasifikasi_surat.destroy', $ks->id) }}" method="POST" style="display: inline-block" class="form-hapus">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-hapus" data-id="{{ $ks->id }}" data-name="{{ $ks->klasifikasi_surat }}">
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
