<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash Screen</title>
    <style>
        /* Style your splash screen here */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #ffffff;
            opacity: 0;
            /* Start with zero opacity */
            animation: fade-in 2s forwards;
            /* Apply fade-in animation */
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes fade-out {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        .centered-image {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>

<body>
    <img src="{{ asset('assets/travelyu_logo.png') }}" alt="Splash Image" class="centered-image">
    <script>
        setTimeout(function () {
            document.body.style.animation = 'fade-out 3s forwards'; // Apply fade-out animation
            setTimeout(function () {
                window.location.href = '{{ route('home') }}'; // Redirect after fade-out animation
            }, 2000); // Wait for fade-out animation duration
        }, 3000); // Set the delay in milliseconds (e.g., 3000 ms = 3 seconds)
    </script>
</body>

</html>