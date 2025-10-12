@extends('public.partials.app') 

@section('title', 'Hasil Seleksi | SIPARLEMEN')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/ketentuan.css') }}">
@endpush

@section('content')
  <!-- ====== HEADER SECTION ====== -->
  <section class="ketentuan-header d-flex align-items-center justify-content-center text-center text-white">
    <div class="overlay"></div>
    <div class="content">
      <h1 class="fw-bold">Surat Pemberitahuan Hasil Seleksi</h1>
      <p class="fw-bold">Peserta Parlemen Remaja</p>
    </div>
  </section>

  <!-- ====== KONTEN KETENTUAN ====== -->
  <section class="ketentuan-content py-5">
    <div class="container">
      <div class="card shadow-lg border-0 p-4 p-md-5">
        <h3 class="fw-bold mb-4 text-center">Surat Pemberitahuan Hasil Seleksi Peserta Parlemen Remaja</h3>

        <p>
          Parlemen Remaja adalah kegiatan tahunan yang diselenggarakan oleh Dewan Perwakilan Rakyat Republik Indonesia 
          sebagai sarana pembelajaran bagi siswa SMA/sederajat untuk mengenal dan memahami fungsi DPR RI.
        </p>

        <!-- Poster images -->
       <!-- PDF Viewer Section -->
<div class="pdf-viewer text-center my-4">
  <iframe 
    src="{{ asset('pdf/seleksi.pdf') }}" 
    class="pdf-frame shadow rounded" 
    frameborder="0">
  </iframe>
</div>


        

        <!-- ====== DOKUMEN PERSYARATAN ====== -->
        <div class="dokumen-section mt-5">
          <h4 class="fw-bold  mb-3 text-center">Contoh Dokumen Persyaratan</h4>
          <div class="list-group">
            <div class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-md-center py-3">
              <div>
                <h6 class="fw-semibold mb-1 text-dark">Surat Izin Mengikuti Kegiatan Parlemen Remaja</h6>
                <p class="text-muted small mb-0">Diketahui oleh Kepala Sekolah dan orang tua/wali.</p>
              </div>
              <a href="{{ asset('docs/Surat_Izin_Mengikuti_Kegiatan_(Lampiran_1).docx') }}" class="btn btn-success mt-3 mt-md-0 px-4 py-2 rounded-pill">
                <i class="bi bi-download me-2"></i>Unduh Lampiran 1
              </a>
            </div>

            <div class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-md-center py-3">
              <div>
                <h6 class="fw-semibold mb-1 text-dark">Surat Pernyataan Mengikuti Seluruh Rangkaian Kegiatan</h6>
                <p class="text-muted small mb-0">Surat bermaterai dan ditandatangani peserta.</p>
              </div>
              <a href="{{ asset('docs/Surat_Pernyataan_(Lampiran_2).docx') }}" class="btn btn-success mt-3 mt-md-0 px-4 py-2 rounded-pill">
                <i class="bi bi-download me-2"></i>Unduh Lampiran 2
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
