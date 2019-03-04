<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <!-- Title Page-->
    <title>@yield('title') | {{$settings->name}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicons -->
    <link href="/frontend/img/Logo_32x32.png" rel="icon">
    <link href="/frontend/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- Bootstrap CSS File -->
    {{--<link href="/frontend/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}
    <link href="/css/app.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="/frontend/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/frontend/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/frontend/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="/frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
@yield('stylesheets')
<!-- Main Stylesheet File -->
    <link href="/frontend/css/style.css" rel="stylesheet">
{!! $settings->head_scripts !!}
<!-- =======================================================
      Theme Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
    @if (Request::is('contact') || Route::is('blog.single') || Route::is('author'))
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif
</head>
<body>
<div class="click-closed"></div>
