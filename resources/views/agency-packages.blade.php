<x-app-layout>
    <style>
        .custom-carousel .carousel-inner .carousel-item {
            height: 500px;
            /* Example fixed height */
        }

        .custom-carousel .carousel-inner img {
            object-fit: fill;
            /* Cover the area of the carousel item without stretching */
            height: 100%;
            /* Ensure the image covers the full height of the item */
        }

        .package {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .package img {
            max-height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .package-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .package-card:hover {
            transform: translateY(-5px);
        }

        .package-card img {
            height: 200px;
            object-fit: cover;
        }

        .package-card .card-body {
            padding: 15px;
        }

        .package-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .package-details .days {
            font-weight: 500;
            color: #555;
        }

        .package-details .price {
            font-weight: bold;
            color: #dc3545;
            /* Bootstrap danger color for consistency */
        }

        .card-title {
            margin-bottom: 15px;
        }

        /* Rating stars style */
        .package-card .bi-star-fill {
            color: #ffc107;
            /* Bootstrap warning color for stars */
        }

        /* Use Bootstrap icons like 'bi-calendar' for icons */
        .bi {
            margin-right: 5px;
        }

        .location {
            color: #555;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .bi-geo-alt-fill {
            color: #dc3545;
            /* Bootstrap danger color or choose your own */
            margin-right: 5px;
        }

        /* @media (min-width: 768px) {
            .container.text-center {
                padding-top: 7rem;
            }
        } */
    </style>


    <!-- Agency Image Section -->
    {{-- <div class="container text-center">
        <!-- Check if the agency has an image and display it -->
        @if($agency->profile_image)
        <img src="{{ asset('storage/profile_images/' . basename($agency->profile_image)) }}"
            alt="{{ $agency->agency_name }}" class="img-fluid rounded"
            style="max-height: 300px; object-fit: cover; width: 100%;">
        @else
        <!-- Display a default image if the agency doesn't have a profile image -->
        <img src="{{ asset('assets/image1.jpg') }}" alt="Default Agency Image" class="img-fluid rounded"
            style="max-height: 300px; object-fit: cover; width: 100%;">
        @endif
        <h1 class="mt-4">{{ $agency->agency_name }}</h1>
        <p>{{ $agency->tagline }}</p>
    </div> --}}

    <!-- Packages Section -->
    <div class="container pt-4">
        <x-tour-packages :title="'Packages offered by ' . $agency->agency_name" :subtitle="'Packages'"
            :packages="$packages" />
    </div>

    <x-footer />
</x-app-layout>