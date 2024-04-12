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

<div class="container-xxl py-5 destination">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">
                {{ $subtitle }}
            </h6>
            <h1 class="mb-5">{{ $title }}</h1>
        </div>
        @if($packages->isEmpty())
        <!-- Check if the packages collection is empty -->
        <div class="row">
            <div class="col text-center">
                <h3 class="mb-3">No Packages Available</h3>
                <p class="mb-4">Currently, there are no available packages to display. Please check back later for
                    updates or explore other destinations.</p>
                <a href="{{ route('home') }}" class="btn btn-primary">Return Home</a>
            </div>
        </div>
        @else
        <div class="row g-3">
            @foreach($packages as $package)
            @php
            $images = $package->image; // Assuming this is an array
            $randomIndex = array_rand($images); // Get a random index
            $image = $images[$randomIndex]; // Get the image
            @endphp
            <!-- <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.{{ $loop->iteration }}s">
                <div class="position-relative d-block overflow-hidden" style="height: 100%; background: #eee;">
                    @auth
                    <a href="{{ route('packages.show', $package) }}"
                        class="h-100 d-flex align-items-end justify-content-center flex-column">
                        @else
                        <a href="{{ route('register') }}"
                            class="h-100 d-flex align-items-end justify-content-center flex-column">
                            @endauth
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $image) }}"
                                alt="{{ $package->name }}" style="object-fit: cover;">
                            <div class="text-overlay">
                                <div class="bg-white text-primary fw-bold m-3 py-1 px-2">
                                    {{ $package->name }}
                                </div>
                            </div>
                        </a>
                </div>
            </div> -->
            <div class="col-md-4 mb-3">
                <div class="card package-card">
                    <!-- Package Image -->
                    @if($package->image)
                    <img src="{{ asset('storage/' . $package->image[0]) }}" class="card-img-top"
                        alt="{{ $package->name }}">
                    @endif

                    <!-- Package Info -->
                    <div class="card-body">
                        <h5 class="card-title">{{ $package->name }}</h5>
                        <!-- Location -->
                        {{-- <p class="card-text location">
                            <i class="bi bi-geo-alt-fill"></i> {{ $package->destination->city }}, {{
                            $package->destination->province }}
                        </p> --}}
                        <div class="package-details mb-2">
                            <span class="days"><i class="bi bi-calendar3"></i> {{ $package->duration }} days</span>
                            {{-- <span class="price">From ₱{{ $package->price }}</span> --}}
                        </div>
                        <p class="card-text">{{ $package->description }}</p>
                        <a href="{{ route('packages.show', $package->id) }}" class="btn btn-primary">Explore</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>