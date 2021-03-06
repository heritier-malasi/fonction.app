<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name','filesystems.links.C:\laragon\www\fondation01\public\storage')}}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta content="" name="">


    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('mamba/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('mamba/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{ asset('mamba/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('mamba/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('mamba/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{ asset('mamba/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('mamba/assets/vendor/aos/aos.css" rel="stylesheet')}}">

    <!-- Template Main CSS File -->
    <link href="{{ asset('mamba/assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Mamba - v2.5.0
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


    @include('layouts.template.home.topbar')
    @include('layouts.template.home.header')
    @include('layouts.template.home.hero')
    @yield('content')
    @include('layouts.template.home.footer')



    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('mamba/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('mamba/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('mamba/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('mamba/assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('mamba/assets/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
    <script src="{{asset('mamba/assets/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('mamba/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('mamba/assets/vendor/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('mamba/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('mamba/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('mamba/assets/vendor/aos/aos.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('mamba/assets/js/main.js')}}"></script>
</body>

</html>
