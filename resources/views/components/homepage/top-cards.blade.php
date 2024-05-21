<!-- Destination Start -->
<div class="py-5 container-xxl destination">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="px-3 text-center bg-white section-title text-primary">
                {{ $subtitle }}
            </h6>
            <h1 class="mb-5">{{ $title }}</h1>
        </div>
        <div class="row g-3">
            @foreach($destinations as $destination)
            @php
            $images = $destination->image; // Assuming this is an array
            $randomIndex = array_rand($images); // Get a random index from the array
            $image = $images[$randomIndex]; // Get the image at the random index
            @endphp
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.{{ $loop->iteration }}s">
                <div class="overflow-hidden position-relative d-block" style="height: 100%; background: #eee;">
                    <!-- Conditional link based on authentication status -->
                    @auth
                    <a href="{{ route('destinations.detail', ['destinations' => $destination->city, 'destinationId' => $destination->id]) }}"
                        class="h-100 d-flex align-items-end justify-content-center flex-column">
                        @else
                        <a href="{{ route('register') }}"
                            class="h-100 d-flex align-items-end justify-content-center flex-column">
                            @endauth
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $image) }}"
                                alt="{{ $destination->name }}" style="object-fit: cover;">
                            <div class="text-overlay">
                                <div class="px-2 py-1 m-3 bg-white text-primary fw-bold">
                                    {{ $destination->name }}
                                </div>
                            </div>
                            <div class="text-overlay">
                                <p class="px-4">Description:</p>
                                <div class="px-2 py-1 m-3 text-primary fw-bold">
                                    {{ $destination->description }}
                                </div>
                            </div>
                        </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Destination End -->