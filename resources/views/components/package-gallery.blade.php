<style>
    /* Adding some global styles for body if not already there */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
    }

    .destination .section-title {
        margin-bottom: 2rem;
        padding: 0.25rem 1rem;
        display: inline-block;
        border: solid 2px;
        border-radius: 25px;
    }

    .card-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        transition: transform 0.3s ease;
        transform: translateY(100%);
        background: rgba(40, 167, 69, 0.85);
        color: white;
        /* Using the green theme color */
    }

    .destination-card:hover .card-overlay {
        transform: translateY(0);
    }

    .destination-card {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        /* Slightly rounded corners for a softer look */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Subtle shadow for depth */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .destination-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .destination-card img {
        transition: transform 0.3s ease-out;
        height: 100%;
        /* Fixed height to ensure uniformity */
        object-fit: cover;
        /* Cover ensures the image fills the card */
    }

    .destination-card:hover img {
        transform: scale(1.05);
        /* Slight zoom on hover */
    }

    .destination-info {
        padding: 1rem;
        text-align: center;
        /* Centering the text */
    }

    .destination h1,
    .destination h6 {
        color: #28a745;
        /* Using the green theme color */
    }
</style>

<div class="py-5 container-xxl destination">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-center bg-white section-title text-primary">
                {{ $subtitle }}
            </h6>
            <h1 class="mb-5">{{ $title }}</h1>
        </div>
        <div class="row g-3">
            @foreach($packages as $package)
            @php
            $images = $package->image; // Assuming this is an array
            $randomIndex = array_rand($images); // Get a random index
            $image = $images[$randomIndex]; // Get the image
            @endphp
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.{{ $loop->iteration }}s">
                <div class="destination-card">
                    @auth
                    <!-- <a href="{{ route('packages.show', $package) }}" class="h-100"> -->
                    <a href="#" class="h-100">
                        @else
                        <a href="{{ route('register') }}" class="h-100">
                            @endauth
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $image) }}"
                                alt="{{ $package->name }}">
                            <div class="card-overlay">
                                <div class="destination-info">
                                    <h5 style="color: white;">{{ $package->name }}</h5>
                                    <p style="color: white;">{{ $package->description }}</p>
                                </div>
                            </div>
                        </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>