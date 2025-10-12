<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'SIPERDANA')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

  @stack('styles')
</head>

<body>
  {{-- Navbar --}}
  @include('public.partials.navbar')

  {{-- Konten --}}
  <main>
    @yield('content')
  </main>

  
  {{-- Footer --}}
  @include('public.partials.footer')

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  @stack('scripts')

  <script>
    document.addEventListener("scroll", function () {
      const navbar = document.querySelector(".custom-navbar");
      if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
      } else {
        navbar.classList.remove("scrolled");
      }
    });
  </script>
</body>
</html>
