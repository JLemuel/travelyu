<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Travelyu') }}</title>

    <!-- Favicon -->
    <link href="{{ asset('csslayout/img/favicon.ico') }}" rel="icon" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('csslayout/lib/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('csslayout/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('csslayout/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('csslayout/css/bootstrap.min.css') }}" rel="stylesheet" />


    <!-- Template Stylesheet -->
    <link href="{{ asset('csslayout/css/style.css') }}" rel="stylesheet" />
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    {{--
    <link href="{{ asset('build/assets/app-DtC4mRBH.css') }}" rel="stylesheet" /> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.css">

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.js"></script> --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased">
    <div>
        @include('layouts.new-nav')


        <main>
            {{ $slot }}
        </main>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    </div>

    <script>
        window.addEventListener('load', function() {
            window.scrollTo(0, 0);
        });
        
        document.addEventListener('DOMContentLoaded', (event) => {
            if (window.location.hash === '#search-results') {
                const searchResultsElement = document.getElementById('search-results');
                if (searchResultsElement) {
                    searchResultsElement.scrollIntoView({behavior: 'smooth', block: 'start'});
                }
            }
        });
    </script>
    @yield('scripts')
    @stack('scripts')


    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('csslayout/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('csslayout/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('csslayout/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('csslayout/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('csslayout/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('csslayout/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('csslayout/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('csslayout/js/main.js') }}"></script>

</body>

</html>