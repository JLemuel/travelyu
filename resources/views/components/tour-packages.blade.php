<style>
    .custom-carousel .carousel-inner .carousel-item {
        height: 500px;
    }

    .custom-carousel .carousel-inner img {
        object-fit: fill;
        height: 100%;
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
    }

    .card-title {
        margin-bottom: 15px;
    }

    .package-card .bi-star-fill {
        color: #ffc107;
    }

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
        margin-right: 5px;
    }
</style>

<div class="py-5 container-xxl destination">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="px-3 text-center bg-white section-title text-primary">
                {{ $subtitle }}
            </h6>
            <h1 class="mb-5">{{ $title }}</h1>
        </div>
        @if($packages->isEmpty())
        <div class="row">
            <div class="text-center col">
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
            $today = Carbon\Carbon::now(); // Get today's date
            $endDate = $today->copy()->addDays($package->duration); // Calculate the end date
            @endphp
            <div class="mb-3 col-md-4">
                <div class="card package-card">
                    @if($package->image)
                    <img src="{{ asset('storage/' . $package->image[0]) }}" class="card-img-top"
                        alt="{{ $package->name }}">
                    @endif
                    <div class="card-body mt-2">
                        <p class="card-text">
                            <strong class="text-primary">Travel Agency:</strong>
                            <a href="{{ route('travelAgency.show', $package->travelAgency->id) }}">
                                {{ $package->travelAgency->agency_name }}
                            </a>
                        </p>

                        <h5 class="card-title">{{ $package->name }}</h5>
                        <div class="mb-2 package-details">
                            <span class="days">
                                <i class="bi bi-calendar3"></i>
                                {{ $today->format('M d, Y') }} - {{ $endDate->format('M d, Y') }} ({{ $package->duration
                                }} days)
                            </span>
                        </div>
                        <p class="card-text">{{ $package->description }}</p>
                        {{-- <p class="card-text location">
                            <i class="bi bi-geo-alt-fill"></i> {{ $package->destination->city }}, {{
                            $package->destination->province }}
                        </p> --}}

                        <a href="{{ route('packages.show', $package->id) }}" class="btn btn-primary">Explore</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>