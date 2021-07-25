<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('sekolah.title') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/mentor/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/mentor/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/mentor/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/mentor/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/mentor/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/mentor/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/mentor/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/mentor/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/mentor/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Fontawesome -->
  <link rel="stylesheet" href="{{ asset('assets/mentor/fontawesome/css/all.min.css') }}">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/mentor/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v2.2.1
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
@yield('konten')
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{ url('/') }}">{{ config('sekolah.title') }}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('about') }}">About</a></li>
          <li><a href="{{ url('register') }}">Daftar</a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  @yield('hero')

  <main id="main">

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row justify-content-center">

          <div class="footer-contact text-center">
            <h3>{{ config('sekolah.title') }}</h3>
            <p>{{ config('sekolah.alamat_lengkap') }}</p>
            <p>{{ config('sekolah.kode_pos') }}</p>
            <p>{{ config('sekolah.nomor_telepon') }}</p>
            <p>{{ config('sekolah.email') }}</p>
            <p>{{ date('Y') }}</p>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          {{ date('Y') }} &copy; Copyright <strong><span>Aldiama Hari Octavian. Y</span></strong>. All Rights Reserved
        </div>
        {{-- <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">Bootstrap Made</a>
        </div> --}}
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://web.facebook.com/Aldiama16/" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/aldiamahari/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/mentor/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/mentor/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/mentor/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/mentor/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/mentor/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/mentor/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('assets/mentor/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/mentor/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/mentor/js/main.js') }}"></script>

</body>
@include('sweetalert::alert')

</html>