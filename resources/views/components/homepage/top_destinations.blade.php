{{--
<!-- resources/views/components/top_destinations.blade.php -->

<div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
    <!-- Destination 1 -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="destination1.jpg" alt="Destination 1" class="w-full h-64 object-cover object-center">
        <div class="p-4">
            <h3 class="text-xl font-semibold mb-2">Destination 1</h3>
            <p class="text-gray-600">Description of destination 1.</p>
            <a href="#" class="text-green-600 hover:underline mt-2 inline-block">Learn More</a>
        </div>
    </div>

    <!-- Destination 2 -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="destination2.jpg" alt="Destination 2" class="w-full h-64 object-cover object-center">
        <div class="p-4">
            <h3 class="text-xl font-semibold mb-2">Destination 2</h3>
            <p class="text-gray-600">Description of destination 2.</p>
            <a href="#" class="text-green-600 hover:underline mt-2 inline-block">Learn More</a>
        </div>
    </div>

    <!-- Destination 3 -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="destination3.jpg" alt="Destination 3" class="w-full h-64 object-cover object-center">
        <div class="p-4">
            <h3 class="text-xl font-semibold mb-2">Destination 3</h3>
            <p class="text-gray-600">Description of destination 3.</p>
            <a href="#" class="text-green-600 hover:underline mt-2 inline-block">Learn More</a>
        </div>
    </div>
</div> --}}

<!-- Destination Start -->
{{-- <div class="container-xxl py-5 destination">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">
                Destination
            </h6>
            <h1 class="mb-5">Popular Destination</h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-7 col-md-6">
                <div class="row g-3">
                    <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                        <a class="position-relative d-block overflow-hidden" href="">
                            <img class="img-fluid" src="img/destination-1.jpg" alt="" />
                            <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">
                                30% OFF
                            </div>
                            <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                Thailand
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                        <a class="position-relative d-block overflow-hidden" href="">
                            <img class="img-fluid" src="img/destination-2.jpg" alt="" />
                            <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">
                                25% OFF
                            </div>
                            <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                Malaysia
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                        <a class="position-relative d-block overflow-hidden" href="">
                            <img class="img-fluid" src="img/destination-3.jpg" alt="" />
                            <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">
                                35% OFF
                            </div>
                            <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                Australia
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px">
                <a class="position-relative d-block h-100 overflow-hidden" href="">
                    <img class="img-fluid position-absolute w-100 h-100" src="img/destination-4.jpg" alt=""
                        style="object-fit: cover" />
                    <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">
                        20% OFF
                    </div>
                    <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                        Indonesia
                    </div>
                </a>
            </div>
        </div>
    </div>
</div> --}}
<!-- Destination Start -->

<!-- Destination Start -->
<div class="container-xxl py-5 destination">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">
                Destination
            </h6>
            <h1 class="mb-5">Popular Destinations</h1>
        </div>
        <div class="row g-3">
            @foreach($destinations as $destination)
            @php
            $images = $destination->image; // Assuming this is an array
            $randomIndex = array_rand($images); // Get a random index from the array
            $image = $images[$randomIndex]; // Get the image at the random index
            @endphp
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.{{ $loop->iteration }}s">
                <div class="position-relative d-block overflow-hidden" style="height: 100%; background: #eee;">
                    <a href="#" class="h-100 d-flex align-items-end justify-content-center flex-column">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $image) }}"
                            alt="{{ $destination->name }}" style="object-fit: cover;">
                        <div class="text-overlay">
                            <div class="bg-white text-danger fw-bold m-3 py-1 px-2">
                                {{-- Discount can be placed here if available --}}
                            </div>
                            <div class="bg-white text-primary fw-bold m-3 py-1 px-2">
                                {{ $destination->name }}
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