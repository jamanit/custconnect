<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Page') }} - @stack('title', 'Title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('/') }}stisla-template/dist/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}stisla-template/dist/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('/') }}stisla-template/dist/assets/modules/jquery-selectric/selectric.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('/') }}stisla-template/dist/assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}stisla-template/dist/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}stisla-template/dist/assets/css/components.css">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('styles')
</head>

<body>
    <div id="app">

        @yield('content')

    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('/') }}stisla-template/dist/assets/modules/jquery.min.js"></script>
    <script src="{{ asset('/') }}stisla-template/dist/assets/modules/popper.js"></script>
    <script src="{{ asset('/') }}stisla-template/dist/assets/modules/tooltip.js"></script>
    <script src="{{ asset('/') }}stisla-template/dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}stisla-template/dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('/') }}stisla-template/dist/assets/modules/moment.min.js"></script>
    <script src="{{ asset('/') }}stisla-template/dist/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('/') }}stisla-template/dist/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="{{ asset('/') }}stisla-template/dist/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('/') }}stisla-template/dist/assets/js/page/auth-register.js"></script>

    <!-- Template JS File -->
    <script src="{{ asset('/') }}stisla-template/dist/assets/js/scripts.js"></script>
    <script src="{{ asset('/') }}stisla-template/dist/assets/js/custom.js"></script>

    @stack('scripts')
</body>

</html>
