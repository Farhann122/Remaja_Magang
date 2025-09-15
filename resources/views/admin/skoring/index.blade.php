@extends('layouts.app')

@php
use App\Models\Barang;
use Illuminate\Support\Str;
@endphp

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <div>
        <ol class="breadcrumb fs-sm mb-1 ">
            <li class="breadcrumb-item">Pembuatan TOR</li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Skoring</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Skoring</h4>
    </div>
    <div>
        <a href="{{ route('admin.skoring.create') }}" class="btn btn-success">
            <i class="ri-pencil-line"></i> Tambah Skoring
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
                        <th scope="col" class="p-1 text-center" style="width: 10%;">Operator</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">Harga Satuan</th>
                        <th scope="col" class="p-1 text-center" style="width: 10%;">Kategori</th>
                        <th scope="col" class="p-1 text-center" style="width: 10%;">Umur Ekonomis</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">Jenis Barang</th>
                        <th scope="col" class="p-1 text-center" style="width: 10%;">Sifat Barang</th>
                        <th scope="col" class="p-1 text-center" style="width: 15%;">Keterangan</th>
                        <th scope="col" class="p-1 text-center" style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skoring as $index => $item)
                    <tr>
                        <td class="p-1 text-center">{{ $index + 1 }}</td>
                        <td class="p-1 text-center">{{ $item->operator }}</td>
                        <td class="p-1 text-center">Rp. {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                        <td class="p-1 text-center">{{ $item->kategori == 1 ? 'Belanja Modal' : 'Belanja Barang' }}</td>
                        <td class="p-1 text-center">{{ Barang::$umurEkonomis[$item->umur_ekonomis] ?? $item->umur_ekonomis }}</td>
                        <td class="p-1 text-center">{{ Barang::$jenisBarang[$item->jenis_barang] ?? $item->jenis_barang }}</td>
                        <td class="p-1 text-center">{{ Barang::$sifatBarang[$item->sifat_barang] ?? $item->sifat_barang }}</td>
                        <td class="p-1 text-center">{{ Barang::$keterangan[$item->keterangan] ?? Str::limit($item->keterangan, 50) }}</td>
                        <td class="p-1 text-center">
                            <a href="{{ route('admin.skoring.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="ri-edit-2-line"></i> Edit
                            </a>
                            <form action="{{ route('admin.skoring.destroy', $item->id) }}" method="POST" style="display: inline-block" class="form-hapus">
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
        // Show success message if exists
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

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
