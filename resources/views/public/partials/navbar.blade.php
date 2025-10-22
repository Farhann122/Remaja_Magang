<nav class="navbar navbar-expand-lg fixed-top navbar-dark custom-navbar">
  <div class="container">
    <!-- Brand / Logo -->
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="{{ asset('image/logo_setjen.png') }}" alt="Logo">
      <div class="brand-text">
        <span class="fw-bold display-6">SIPARLEMEN</span>
        <span>Sistem Informasi Parlemen Remaja</span>
      </div>
    </a>

    <!-- Button mobile toggle -->
    <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse ms-5" id="navMenu">
      <ul class="navbar-nav ms-auto">

        <!-- Beranda -->
        <li class="nav-item">
          <a class="nav-link" href="/">Beranda</a>
        </li>
<li class="nav-item"><a class="nav-link" href="tentangkami">Tentang</a></li>
        <!-- Dropdown: Ketentuan Kegiatan -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="ketentuanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ketentuan Kegiatan
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="ketentuanDropdown">
            <li><a class="dropdown-item" href="/ketentuanumum">Ketentuan Umum</a></li>
            <li><a class="dropdown-item" href="/ketentuanesai">Ketentuan Esai</a></li>
            <li><a class="dropdown-item" href="/ketentuankampanye">Ketentuan Video Kampanye</a></li>
          </ul>
        </li>

        <!-- Dropdown: Pengumuman -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pengumumanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pengumuman
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="pengumumanDropdown">
            <li><a class="dropdown-item" href="/pengumumankegiatan">Surat Pemberitahuan Kegiatan Parlemen Remaja 2025</a></li>
            <li><a class="dropdown-item" href="/pengumumanseleksi">Surat Pemeberitahuan Hasil Seleksi Peserta Parmelen Remaja 2025</a></li>
            
          </ul>
        </li>

        <!-- Menu Lain -->
        <li class="nav-item"><a class="nav-link" href="/publikasi">Publikasi</a></li>
        
      

        <!-- Tombol Login -->
        <li class="nav-item ms-3">
          <a href="/login" class="btn btn-login rounded-pill px-4">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
