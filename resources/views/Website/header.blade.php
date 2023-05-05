<!DOCTYPE html>
<html lang="{{ app()->CurrentLocale() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description"
        content="edutim,coaching, distant learning, education html, health coaching, kids education, language school, learning online html, live training, online courses, online training, remote training, school html theme, training, university html, virtual training  ">

    <meta name="author" content="themeturn.com">

    <title>@yield('titel',env('APP_NAME'))</title>

    <!-- Mobile Specific Meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('website/assets/vendors/bootstrap/bootstrap.css') }}">
    <!-- Iconfont Css -->
    <link rel="stylesheet" href="{{ asset('website/assets/vendors/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/vendors/bicon/css/bicon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/vendors/themify/themify-icons.css') }}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('website/assets/vendors/animate-css/animate.css') }}">
    <!-- WooCOmmerce CSS -->
    <link rel="stylesheet" href="{{ asset('website/assets/vendors/woocommerce/woocommerce-layouts.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/vendors/woocommerce/woocommerce-small-screen.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/vendors/woocommerce/woocommerce.css') }}">
    <!-- Owl Carousel  CSS -->
    <link rel="stylesheet" href="{{ asset('website/assets/vendors/owl/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/vendors/owl/assets/owl.theme.default.min.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/responsive.css') }}">

</head>

    @yield('master')

    <!--
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="{{ asset('website/assets/vendors/jquery/jquery.js') }}"></script>
    <!-- Bootstrap 4.5 -->
    <script src="{{ asset('website/assets/vendors/bootstrap/bootstrap.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ asset('website/assets/vendors/counterup/waypoint.js') }}"></script>
    <script src="{{ asset('website/assets/vendors/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('website/assets/vendors/jquery.isotope.js') }}"></script>
    <script src="{{ asset('website/assets/vendors/imagesloaded.js') }}"></script>
    <!--  Owlk Carousel-->
    <script src="{{ asset('website/assets/vendors/owl/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/script.js') }}"></script>
    <script src="{{ asset('js\app.js') }}"></script>


</body>

</html>
