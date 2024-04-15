<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased"
    style="background: url('{{ asset('assets/elyuu.jpg') }}') no-repeat center center; background-size: cover;">

    <!-- Toast message -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div class="toast bg-success text-light" role="alert" aria-live="assertive" aria-atomic="true"
            data-autohide="false">
            <div class="toast-header">
                <strong class="mr-auto">Attention</strong>
                <button type="button" class="ml-2 mb-1 close text-light" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                You need to login or register to book a package.
            </div>
        </div>
    </div>


    <div class="min-h-screen grid grid-cols-1 sm:grid-cols-2 justify-center items-center gap-6 pt-6 sm:pt-0">
        <div class="flex justify-center">
            <a href="/">
                <x-application-logo class="w-40 h-40 fill-current text-gray-500" />
            </a>
        </div>

        <div
            class="w-full sm:max-w-xl mt-6 px-6 py-4 mb-6 bg-white bg-opacity-90 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- JavaScript to show the toast -->
    <script>
        // Show the toast message
    $(document).ready(function(){
        $('.toast').toast('show');
    });
    </script>
</body>


</html>