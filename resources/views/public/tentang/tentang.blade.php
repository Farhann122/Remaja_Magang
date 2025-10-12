@extends('public.partials.app') 

@section('title', 'Tentang | SIPARLEMEN')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/tentang.css') }}">
@endpush

@section('content')
  <!-- ====== HEADER SECTION ====== -->
  <section class="ketentuan-header d-flex align-items-center justify-content-center text-center text-white">
    <div class="overlay"></div>
    <div class="content">
      <h1 class="fw-bold">Tentang Kami</h1>
      <p class="fw-bold">Sistem Informasi Parlemen Remaja</p>
    </div>
  </section>

  <!-- ====== TENTANG SECTION ====== -->
  <section class="tentang-section py-5">
    <div class="container">
   <div class="row align-items-center justify-content-between">

        <!-- Gambar ilustrasi -->
        <div class="col-lg-6 mb-4 mb-lg-0">
          <img src="{{ asset('image/tentang1.jpg') }}" class="img-fluid rounded-4 shadow" alt="Tentang Parlemen Remaja">
        </div>

        <!-- Teks tentang -->
        <div class="col-lg-6">
          <h2 class="fw-bold mb-3 text-dark">Apa itu SIPARLEMEN?</h2>
          <p class="text-secondary mb-4 text-justify">
            <strong>SIPARLEMEN (Sistem Informasi Parlemen Remaja)</strong> adalah platform digital yang dirancang untuk memfasilitasi kegiatan <em>Parlemen Remaja</em> — sebuah program edukasi politik yang diselenggarakan oleh DPR RI untuk generasi muda.
          </p>
          <p class="text-secondary mb-4">
            Melalui sistem ini, peserta dapat mengakses informasi kegiatan, mendaftar secara daring, melihat hasil seleksi, serta mengikuti berbagai kegiatan Parlemen Remaja dengan lebih mudah, cepat, dan transparan.
          </p>

          <a  class="btn btn-warning rounded-pill px-4 py-2 fw-semibold text-dark">
            Jelajahi Publikasi <i class="bi bi-arrow-right-circle ms-2"></i>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ====== VISI & MISI ====== -->
  {{-- <section class="visi-misi bg-light py-5">
    <div class="container text-center">
      <h2 class="fw-bold mb-4 text-dark">Visi & Misi Kami</h2>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card border-0 shadow-sm rounded-4 p-4">
            <h5 class="fw-semibold text-dark mb-3">Visi</h5>
            <p class="text-secondary mb-4">
              Mewujudkan generasi muda yang sadar politik, partisipatif, dan berintegritas melalui pendidikan parlemen yang transparan dan inklusif.
            </p>

            <h5 class="fw-semibold text-dark mb-3">Misi</h5>
            <ul class="text-secondary text-start mx-auto" style="max-width: 600px;">
              <li>Meningkatkan literasi politik generasi muda Indonesia.</li>
              <li>Menyediakan sistem informasi yang mudah diakses dan transparan.</li>
              <li>Mendorong partisipasi aktif remaja dalam kegiatan demokrasi.</li>
              <li>Menjadi wadah inspirasi bagi calon pemimpin masa depan bangsa.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  <!-- ====== TIM PARLEMEN ====== -->
  <section class="tim-section py-5">
    <div class="container text-center">
      <h2 class="fw-bold mb-4 text-dark">Tim Pengembang SIPARLEMEN</h2>
      <p class="text-secondary mb-5">
        Sistem ini dikembangkan oleh tim profesional muda dengan semangat inovasi untuk mendukung kegiatan Parlemen Remaja di seluruh Indonesia.
      </p>
      <div class="row justify-content-center g-4">
        <div class="col-md-4">
          <div class="card border-0 shadow-sm rounded-4">
            <img src="{{ asset('images/team-1.jpg') }}" class="card-img-top rounded-top-4" alt="Team Member">
            <div class="card-body">
              <h5 class="fw-bold mb-1 text-dark">Admin Utama</h5>
              <p class="text-muted">Koordinator Sistem & Manajemen Data</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm rounded-4">
            <img src="{{ asset('images/team-2.jpg') }}" class="card-img-top rounded-top-4" alt="Team Member">
            <div class="card-body">
              <h5 class="fw-bold mb-1 text-dark">Tim Teknis</h5>
              <p class="text-muted">Pengembang Web & Integrasi Sistem</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm rounded-4">
            <img src="{{ asset('images/team-3.jpg') }}" class="card-img-top rounded-top-4" alt="Team Member">
            <div class="card-body">
              <h5 class="fw-bold mb-1 text-dark">Tim Kreatif</h5>
              <p class="text-muted">Desain & Komunikasi Visual</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
