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

        .bg-light {
            background-color: #f8f9fa !important;
            /* Adjust the background color as needed */
        }

        .h6,
        span {
            font-size: 0.75rem;
            /* Adjust font size as needed */
        }

        .bi {
            font-size: 1.25rem;
            /* Adjust Bootstrap icon size as needed */
        }

        .bi-star-fill.text-warning {
            color: #ffc107;
            /* Star rating color */
        }

        /* Add some padding and margin to align items */
        .h6 {
            margin-right: 0.5rem;
            font-weight: bold;
        }

        span {
            padding: 0.25rem 0;
        }

        /* Extra small devices (portrait phones, less than 576px) */
        @media (max-width: 575.98px) {

            .h6,
            span {
                font-size: 0.65rem;
                /* Smaller font size for mobile */
            }
        }

        .bi {
            margin-right: 5px;
        }

        .bi-star-fill {
            color: #ffc107;
            /* Gold color for stars */
        }

        .text-muted strong {
            margin-right: 5px;
            color: #000;
            /* Black for text label */
        }

        /* Optionally: Style your spans for additional visual separation */
        .text-muted {
            background-color: #f8f9fa;
            /* light background for each item */
            border-radius: 10px;
            padding: 5px 10px;
            margin: 2px;
            /* spacing between items */
        }

        /* Custom styling for the badge */
        .badge {
            font-weight: 500;
            background-color: #ff3e3e;
            /* or your chosen highlight color */
            color: white;
            /* for the text color */
        }

        /* Adjust the gap if necessary to fit your design */
        .gap-3 {
            gap: 1rem;
            /* Bootstrap 5 gap utility */
        }

        /* Style for the budget range input */
        #tour-plan .input-group {
            width: 250px;
            /* Adjust width as needed */
            margin-bottom: 20px;
        }

        #tour-plan input[type="number"] {
            text-align: center;
        }

        #totalPriceContainer {
            border-top: 1px solid #ddd;
            /* Adjust the color to match the image */
            padding-top: 10px;
            /* Adjust padding to match the image */
        }

        .accordion-button:not(.collapsed) {
            color: white;
            background-color: #5cb85c;
            border-color: #4cae4c;
        }

        .accordion-button {
            color: #5cb85c;
            background-color: transparent;
            border-color: #ddd;
        }

        .accordion-item {
            border: none;
            background: none;
            border-radius: 0;
        }

        .accordion-item .accordion-button::after {
            background-image: url('path-to-your-dropdown-icon.svg');
            /* Path to your dropdown icon */
        }

        .tour-day-content strong {
            font-size: 1.2em;
            color: #333;
        }

        .tour-day-content ul {
            list-style: none;
            padding-left: 20px;
        }

        .tour-day-content li:before {
            content: '•';
            color: #5cb85c;
            /* or any color you prefer */
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        .tour-day-content img {
            width: 100%;
            margin-top: 15px;
            border-radius: 5px;
        }

        .review-rating .star {
            color: #ddd;
            /* Color of empty star */
            margin-right: 5px;
            font-size: 1.2em;
        }

        .review-rating .star.filled {
            color: #ffc107;
            /* Color of filled star */
        }

        #map {
            height: 400px;
            /* Adjust as needed */
        }
    </style>

    <!-- Bootstrap Carousel for Images -->
    <div id="destinationCarousel" class="carousel slide custom-carousel" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            @foreach($package->image as $index => $image)
            <button type="button" data-bs-target="#destinationCarousel" data-bs-slide-to="{{ $index }}"
                class="{{ $index == 0 ? 'active' : '' }}" aria-current="true"
                aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            @foreach($package->image as $index => $image)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $image) }}" class="d-block w-100" alt="Image of {{ $package->name }}">
            </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#destinationCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#destinationCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="px-2 pb-5">
        <div class=" row mt-3">
            <div class="col">
                <h1>{{ $package->name }}</h1>
                <div class="d-flex justify-content-start flex-wrap align-items-center gap-3">
                    <span class="text-muted"><strong>Price:</strong> From ₱{{ $package->price }}</span>
                    <span class="text-muted"><i class="bi bi-clock"></i> <strong>Duration:</strong> {{
                        $package->duration }} days</span>
                    <span class="text-muted"><i class="bi bi-people-fill"></i> <strong>Max People:</strong> {{
                        $package->max_persons }}</span>
                    <span class="text-muted"><i class="bi bi-book-fill"></i>
                        <strong>Booking Limit:</strong> {{ $package->booking_limit }}
                        {{-- ({{ $package->booking }} booked) --}}
                    </span>

                    <span class="text-muted"><i class="bi bi-geo-alt-fill"></i> <strong>Tour Type:</strong> {{
                        $package->type }}</span>
                    <span class="text-muted">
                        <i class="bi bi-star-fill text-warning"></i> <strong>Reviews:</strong> {{
                        $package->reviews->count() }} reviews
                    </span>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="px-2">
                    <!-- Package Description -->
                    <div class="section" id="description">
                        <h2>Description</h2>
                        <p class="mt-4">{{ $package->description }}</p>
                    </div>

                    <!-- Tour Plan -->
                    <div class="section" id="tour-plan">
                        <h2>Tour Plan</h2>
                        <div class="mt-3">
                            <!-- Assuming $package->tour_plan_details is structured for display -->
                            <!-- Displaying Tour Plan Content -->
                            <div class="accordion" id="tourPlanAccordion">
                                @php
                                $days = explode('<p><strong>', $package->tour_plan_details); // Split the content into
                                        array_shift($days); // Remove the first empty element due to explode
                                        @endphp

                                        @foreach($days as $index => $dayContent)
                                        @php
                                        $dayContent = '<p><strong>' . $dayContent;
                                                $dayContent = '<div class="tour-day-content">' . $dayContent . '</div>';
                                                @endphp

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingDay{{ $index }}">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-target="#collapseDay{{ $index }}"
                                                            aria-expanded="true"
                                                            aria-controls="collapseDay{{ $index }}">
                                                            Day {{ $index + 1 }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapseDay{{ $index }}" class="accordion-collapse"
                                                        aria-labelledby="headingDay{{ $index }}"
                                                        data-bs-parent="#tourPlanAccordion">
                                                        <div class="accordion-body">
                                                            {!! $dayContent !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <h2>Location</h2>
                        <div id="map" class="mt-4"></div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="px-2 pt-4">
                    <div class="section" id="reviews">
                        <h2>Reviews</h2>

                        @forelse($package->reviews as $review)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">{{ $review->user->name ?? 'Anonymous' }}</h5>
                                    <div class="review-rating">
                                        @for($i = 0; $i < 5; $i++) <span
                                            class="bi{{ $i < $review->rating ? ' bi-star-fill' : ' bi-star' }}">
                                            </span>
                                            @endfor
                                    </div>
                                </div>
                                <p class="card-text">{{ $review->content }}</p>
                                <p class="text-muted">{{ $review->created_at->format('F d, Y') }}</p>
                            </div>
                        </div>
                        @empty
                        <p>No reviews yet.</p>
                        @endforelse

                    </div>


                    <!-- Additional reviews here -->

                    <!-- Add a Review Form -->
                    <div class="review-form mt-4">
                        <h3>Add Your Review</h3>
                        <form action="/submit-review" method="POST">
                            @csrf
                            <!-- CSRF token for Laravel forms -->

                            <!-- Hidden input for package_id -->
                            <input type="hidden" name="package_id" value="{{ $package->id }}">

                            <div class="mb-3">
                                <label for="reviewRating" class="form-label">Rating</label>
                                <select class="form-select" id="reviewRating" name="reviewRating" required>
                                    <option selected>Choose...</option>
                                    <option value="1">1 - Poor</option>
                                    <option value="2">2 - Fair</option>
                                    <option value="3">3 - Good</option>
                                    <option value="4">4 - Very Good</option>
                                    <option value="5">5 - Excellent</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="reviewText" class="form-label">Your Review</label>
                                <textarea class="form-control" id="reviewText" name="reviewText" rows="3"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        // Coordinates for the starting point (origin)
        var originLat = 16.616003;
        var originLng = 120.316712;
    
        function initMap() {
            // Destination latitude and longitude values from your package variable
            var destLat = {{ number_format($package->destination->lat, 6) }};
            var destLng = {{ number_format($package->destination->lng, 6) }};
            var destination = new google.maps.LatLng(destLat, destLng);
    
            // Create a map object and specify the DOM element for display
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: destination,
                disableDefaultUI: true,
                zoomControl: true,
                mapTypeControl: true,
            });
    
            // Create a directions service object to use the route method and a directions renderer object
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map);
    
            // Set the origin for the directions to the fixed coordinates
            var origin = new google.maps.LatLng(originLat, originLng);
    
            // Calculate and display the route
            calculateAndDisplayRoute(directionsService, directionsRenderer, origin, destination);
        }
    
        function calculateAndDisplayRoute(directionsService, directionsRenderer, origin, destination) {
            directionsService.route({
                origin: origin,
                destination: destination,
                // Specify the travel mode: driving, walking, bicycling or transit
                travelMode: 'DRIVING'
            }, function(response, status) {
                if (status === 'OK') {
                    directionsRenderer.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }
    
        function handleLocationError(browserHasGeolocation, pos) {
            alert(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap"></script>

</x-app-layout>