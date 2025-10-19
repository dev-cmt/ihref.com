<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ $title ?? config('app.name', 'Laravel') }}</title> --}}

    {!! $seotags ?? '' !!}
	{!! $breadcrumbs ?? '' !!}
	{!! $jsonld ?? '' !!}

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- Bootstrap & your custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">


    @stack('css')
</head>

<body class="{{ session('theme', 'light') }}">
    <!-- Navbar / Header -->
    @include('frontend.partials.navbar')

    <!-- Main Page Content -->
    <main class="py-4">
        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('frontend.partials.footer')

    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/app.js') }}"></script>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const c=document.getElementById("dark-mode-toggle-checkbox"), b=document.body;
            b.classList.toggle("dark-mode", localStorage.getItem("darkMode")==="enabled");
            c.checked = b.classList.contains("dark-mode");
            c.onchange = () => {
                b.classList.toggle("dark-mode", c.checked);
                localStorage.setItem("darkMode", c.checked ? "enabled" : "disabled");
            };
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper(".myHeroSwiper", {
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                effect: "fade",
                speed: 1200,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        });
    </script>


    @stack('js')
</body>
</html>
