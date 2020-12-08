<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>EnricoMerchandise</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
  <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <link href="{{ asset('css/main.css') }}" rel="stylesheet">

  <script src="{{ asset('js/plugin.js') }}"></script>

  <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
 


  @yield('css')
</head>

<body>


  <!-- Navbar -->

  <x-navbar2 categories="$categories" />


  <!-- /.navbar -->


  <!-- Header -->
  @yield('header')
  <!-- /.header -->


  <!-- Main Content -->
  <main class="main-content">
    @yield('content')

  </main>


  <!-- Footer -->
  <x-footer />
  <!-- /.footer -->


  <!-- Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="{{ asset('js/page.min.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>

  <!-- Swiper JS -->
  <script src="{{ asset('js/swiper.min.js') }}"></script>


  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 60,
        stretch: 0,
        depth: 500,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>
  @yield('js')

</body>

</html>