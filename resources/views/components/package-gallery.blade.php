<div class="container-xxl py-5 destination">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">
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
                <div class="position-relative d-block overflow-hidden" style="height: 100%; background: #eee;">
                    @auth
                    <!-- <a href="{{ route('packages.show', $package) }}" -->
                    <a href="#"
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
            </div>
            @endforeach
        </div>
    </div>
</div>