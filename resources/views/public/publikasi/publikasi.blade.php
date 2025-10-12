@extends('public.partials.app') 

@section('title', 'Publikasi | SIPARLEMEN')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/ketentuan.css') }}">
@endpush

@section('content')
  <!-- ====== HEADER SECTION ====== -->
  <section class="ketentuan-header d-flex align-items-center justify-content-center text-center text-white">
    <div class="overlay"></div>
    <div class="content">
      <h1 class="fw-bold">Daftar Publikasi</h1>
      
      <p class="fw-bold">Kegiatan Parlemen Remaja</p>
    </div>
  </section>
  <section class="ketentuan-content py-5">
  <div class="container">
    <div class="card shadow-lg border-0 p-4 p-md-5 text-center">
      <h3 class="fw-bold ">Daftar Publikasi</h3>
        <p class="mb-4">Berikut adalah beberapa publikasi dari kegiatan Parlemen Remaja yang dapat diunduh:</p>

      <div class="row g-4">
        <!-- Buku 2024 -->
        <div class="col-md-4">
          <div class="publication-item">
            <img src="{{ asset('image/buku1.jpg') }}" alt="Buku 2024" class="img-fluid rounded shadow-sm mb-3">
            <h5 class="fw-bold">Buku Kumpulan Esai Parlemen Remaja 2024</h5>
            <p class="text-muted small">Generasi Cerdas : Pendidikan Berkualitas, Mewujudkan Indonesia Cerdas</p>
          </div>
        </div>

        <!-- Buku 2023 -->
        <div class="col-md-4">
          <div class="publication-item">
            <img src="{{ asset('image/buku2.png') }}" alt="Buku 2023" class="img-fluid rounded shadow-sm mb-3">
            <h5 class="fw-bold">Buku Kumpulan Esai Parlemen Remaja 2023</h5>
            <p class="text-muted small">Remaja Kenal Hukum: Taat Aturan, Masyarakat Aman</p>
          </div>
        </div>

        <!-- Buku 2022 -->
        <div class="col-md-4">
          <div class="publication-item">
            <img src="{{ asset('image/buku3.jpg') }}" alt="Buku 2022" class="img-fluid rounded shadow-sm mb-3">
            <h5 class="fw-bold">Buku Kumpulan Esai Parlemen Remaja 2022</h5>
            <p class="text-muted small">Generasi Sadar Privasi, Dataku Tanggung Jawabku!</p>
          </div>
        </div>

        <!-- Buku 2021 -->
        <div class="col-md-6 col-lg-4 mx-auto">
          <div class="publication-item">
            <img src="{{ asset('image/buku1.jpg') }}" alt="Buku 2021" class="img-fluid rounded shadow-sm mb-3">
            <h5 class="fw-bold">Buku Kumpulan Esai Parlemen Remaja 2021</h5>
            <p class="text-muted small">Remaja di Era Kebebasan Informasi: Siaran Berkualitas, Masyarakat Cerdas</p>
          </div>
        </div>

        <!-- Buku 2020 -->
        <div class="col-md-6 col-lg-4 mx-auto">
          <div class="publication-item">
            <img src="{{ asset('image/buku3.jpg') }}" alt="Buku 2020" class="img-fluid rounded shadow-sm mb-3">
            <h5 class="fw-bold">Buku Kumpulan Esai Parlemen Remaja 2020</h5>
            <p class="text-muted small">Gotong Royong Mengatasi Pandemi COVID-19: Optimis Kita Bisa!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

 

      </div>
    </div>
  </section>
@endsection
