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
    </style>


    <div class="container " style="padding-top: 5rem">
        <x-tour-packages :title="'All Tour Packages'" :subtitle="'Packages'" :packages="$packages" />
    </div>

    <x-footer />
</x-app-layout>