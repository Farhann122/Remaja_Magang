<section class="hero" style="background-image: url('{{ asset('image/home.jpg') }}');">
  <div class="overlay"></div>

  <div class="container hero-content text-center text-white d-flex flex-column justify-content-center align-items-center">
    <h1 class="display-3 fw-bold">Selamat Datang di SIPARLEMEN</h1>
    <p class="lead mt-3">Sistem Informasi Parlemen Remaja</p>
    <div class="mt-4">
      <a href="#" class="btn btn-light btn-sm me-2"><i class="bi bi-facebook"></i></a>
      <a href="#" class="btn btn-light btn-sm me-2"><i class="bi bi-twitter"></i></a>
      <a href="#" class="btn btn-light btn-sm"><i class="bi bi-instagram"></i></a>
    </div>
  </div>
</section>

<section class="tujuan-section py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-5 text-dark">Tujuan Parlemen Remaja</h2>
    <div class="row justify-content-center g-4">
      
      <div class="col-md-3 col-sm-6">
        <div class="card-tujuan shadow-sm">
          <div class="icon-wrapper bg-warning bg-opacity-25">
            <img src="{{ asset('image/tujuan1.svg') }}" alt="Fungsi DPR" />
          </div>
          <p class="mt-3">
            Memasyarakatkan Fungsi dan Peranan DPR-RI kepada Remaja 
            sebagai Generasi Penerus Bangsa.
          </p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="card-tujuan shadow-sm">
          <div class="icon-wrapper bg-success bg-opacity-25">
            <img src="{{ asset('image/tujuan2.svg') }}" alt="Pemahaman Siswa" />
          </div>
          <p class="mt-3">
            Memberikan pemahaman kepada siswa tentang proses pembuatan 
            kebijakan publik di Parlemen.
          </p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="card-tujuan shadow-sm">
          <div class="icon-wrapper bg-info bg-opacity-25">
            <img src="{{ asset('image/tujuan3.svg') }}" alt="Demokrasi" />
          </div>
          <p class="mt-3">
            Meningkatkan pemahaman tentang proses demokrasi di Indonesia 
            melalui pelaksanaan simulasi Parlemen.
          </p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="card-tujuan shadow-sm">
          <div class="icon-wrapper bg-purple bg-opacity-25">
            <img src="{{ asset('image/tujuan4.svg') }}" alt="Partisipasi Remaja" />
          </div>
          <p class="mt-3">
            Mendorong keterlibatan pemuda dalam partisipasi bermakna 
            sebagai bagian integral dari proses pembentukan kebijakan publik.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ====== P U B L I K A S I  S E C T I O N ====== -->
<section class="publikasi-section py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold section-title">Publikasi</h2>
      <p class="text-muted fs-6">
        Kumpulan karya dan esai dari peserta Parlemen Remaja setiap tahunnya
      </p>
    </div>

    <div class="carousel-container">
      <button class="arrow prev">&#10094;</button>

      <div class="carousel">
        <!-- Buku 2024 -->
        <div class="book">
          <img src="{{ asset('image/buku1.jpg') }}" alt="Buku Esai 2024" />
          <h5>Buku Kumpulan Esai Parlemen Remaja 2024</h5>
          <p>Generasi Cerdas: Pendidikan Berkualitas, Mewujudkan Indonesia Cerdas</p>
        </div>

        <!-- Buku 2023 -->
        <div class="book">
          <img src="{{ asset('image/buku2.png') }}" alt="Buku Esai 2023" />
          <h5>Buku Kumpulan Esai Parlemen Remaja 2023</h5>
          <p>Remaja Kenal Hukum: Taat Aturan, Masyarakat Aman</p>
        </div>

        <!-- Buku 2022 -->
        <div class="book">
          <img src="{{ asset('image/buku3.jpg') }}" alt="Buku Esai 2022" />
          <h5>Buku Kumpulan Esai Parlemen Remaja 2022</h5>
          <p>Generasi Sadar Privasi, Dataku Tanggung Jawabku!</p>
        </div>

        <!-- Buku tambahan (opsional) -->
        <div class="book">
          <img src="{{ asset('image/kampanye.jpeg') }}" alt="Buku Esai 2021" />
          <h5>Buku Kumpulan Esai Parlemen Remaja 2021</h5>
          <p>Membangun Generasi Peduli dan Berintegritas di Era Digital</p>
        </div>
      </div>

      <button class="arrow next">&#10095;</button>
    </div>

    <!-- Titik Pagination -->
    <div class="pagination-dots">
      <span class="active"></span>
      <span></span>
      <span></span>
      <span></span>
    </div>

    <div class="text-center">
      <a href="#" class="btn-lihat">LIHAT SEMUA</a>
    </div>
  </div>
</section>

<script>
  const carousel = document.querySelector(".carousel");
  const nextBtn = document.querySelector(".next");
  const prevBtn = document.querySelector(".prev");
  const dots = document.querySelectorAll(".pagination-dots span");

  let scrollPosition = 0;

  nextBtn.addEventListener("click", () => {
    carousel.scrollBy({ left: 300, behavior: "smooth" });
    updateDots(1);
  });

  prevBtn.addEventListener("click", () => {
    carousel.scrollBy({ left: -300, behavior: "smooth" });
    updateDots(-1);
  });

  let activeIndex = 0;
  function updateDots(direction) {
    dots[activeIndex].classList.remove("active");
    activeIndex = (activeIndex + direction + dots.length) % dots.length;
    dots[activeIndex].classList.add("active");
  }
</script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".publikasiSwiper", {
    slidesPerView: 1,
    spaceBetween: 25,
    loop: true,
    centeredSlides: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".custom-next",
      prevEl: ".custom-prev",
    },
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    breakpoints: {
      768: { slidesPerView: 2 },
      992: { slidesPerView: 3 },
    },
  });
</script>


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".publikasiSwiper", {
    slidesPerView: 1,
    spaceBetween: 25,
    loop: true,
    centeredSlides: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".custom-next",
      prevEl: ".custom-prev",
    },
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    breakpoints: {
      768: { slidesPerView: 2 },
      992: { slidesPerView: 3 },
    },
  });
</script>


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".publikasiSwiper", {
    slidesPerView: 1,
    spaceBetween: 25,
    loop: true,
    centeredSlides: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    breakpoints: {
      768: { slidesPerView: 2 },
      992: { slidesPerView: 3 },
    },
  });
</script>


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".publikasiSwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      768: { slidesPerView: 2 },
      992: { slidesPerView: 3 },
    },
  });
</script>


<section class="sekilas-section">
  <div class="container">
    <h2>Sekilas Parlemen Remaja</h2>
    <p>
      Parlemen Remaja merupakan kegiatan pembelajaran politik kepada generasi muda,
      khususnya pelajar tingkat Sekolah Menengah Atas (SMA) dan sederajat. Mereka akan
      merasakan simulasi menjadi Anggota DPR RI selama 6 hari.
    </p>

    <div class="video-frame">
      <video controls>
        <source src="video/parja2025.mp4" type="video/mp4" />
        Browser Anda tidak mendukung pemutar video.
      </video>
    </div>
  </div>
</section>

