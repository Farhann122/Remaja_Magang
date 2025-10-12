@extends('public.partials.app')

@section('title', 'SIPARLEMEN')

@section('content')
  @include('public.partials.hero')
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush

@push('scripts')
<script>
  window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
</script>
@endpush
