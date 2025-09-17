<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }} - @yield('title')</title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('backend/images/brand-logos/favicon.ico')}}" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Style Css -->
    <link href="{{ asset('backend/css/styles.min.css') }}" rel="stylesheet">
    <!-- Icons Css -->
    <link href="{{ asset('backend/css/icons.css') }}" rel="stylesheet">

    @stack('css')
</head>
<body>

    {{ $slot }}


    <!-- Jquer JS -->
    <script src="{{ asset('backend/js/jquery.js') }}"></script>

    <!-- Custom-Switcher JS -->
    <script src="{{ asset('backend/js/custom-switcher.min.js')}}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Show Password JS -->
    <script src="{{ asset('backend/js/show-password.js')}}"></script>

    @stack('js')
</body>
</html>
