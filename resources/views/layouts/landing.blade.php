<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('') }}assets-landing/img/favicon.png" rel="icon">
    <link href="{{ asset('') }}assets-landing/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    @stack('before-css')
    <!-- Vendor CSS Files -->
    <link href="{{ asset('') }}assets-landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets-landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('') }}assets-landing/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('') }}assets-landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets-landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('') }}assets-landing/css/main.css" rel="stylesheet">
    @stack('after-css')

    <!-- =======================================================
  * Template Name: Impact
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    @include('includes.topbar-landing')
    <!-- End Top Bar -->
    @include('includes.header-landing')
    <!-- End Header -->
    <!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    @include('includes.footer-landing')
    <!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    @stack('before-js')
    <script src="{{ asset('') }}assets-landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assets-landing/vendor/aos/aos.js"></script>
    <script src="{{ asset('') }}assets-landing/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('') }}assets-landing/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('') }}assets-landing/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('') }}assets-landing/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('') }}assets-landing/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('') }}assets-landing/js/main.js"></script>
    @stack('after-js')

</body>

</html>
