<x-app-layout>
    <style>
        .custom-carousel .carousel-inner .carousel-item {
            height: 500px;
            /* Example fixed height */
        }

        .custom-carousel .carousel-inner img {
            object-fit: cover;
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

    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h1>{{ $package->name }}</h1>
                <div class="d-flex justify-content-start flex-wrap align-items-center gap-3">
                    <span class="text-muted"><strong>Price:</strong> From ₱{{ $package->price }}</span>
                    <span class="text-muted"><i class="bi bi-clock"></i> <strong>Duration:</strong> {{
                        $package->duration }} days</span>
                    <span class="text-muted"><i class="bi bi-people-fill"></i> <strong>Max People:</strong> {{
                        $package->max_persons }}</span>

                    <span class="text-muted"><i class="bi bi-book-fill"></i> <strong>Booking Limit:</strong> {{
                        $package->booking_limit }}</span>
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
            <div class="col-md-7">
                <div class="container">
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

                    <div class="section" id="reviews">
                        <h2>Reviews</h2>

                        @forelse($package->reviews as $review)
                        <div class="card pb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">{{ $review->user->name ?? 'Anonymous' }}</h5>
                                    <div class="review-rating">
                                        @for($i = 0; $i < 5; $i++) <span
                                            class="bi{{ $i < $review->rating ? ' bi-star-fill' : ' bi-star' }}"></span>
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

                </div>
            </div>

            @php
            $today = \Carbon\Carbon::now()->format('Y-m-d');
            $isExpired = $today > $package->end_date;
            @endphp
            <div class="col-md-5">
                @php
                $bookingsCount = $package->bookings()->count();
                $isFullyBooked = $bookingsCount >= $package->booking_limit;
                @endphp

                <div class=" py-3 text-start">
                    <!-- Display how many times this package has been booked -->
                    <span class="text-muted py-2"><i class="bi bi-book-fill"></i> <strong>Booked:</strong> {{
                        $bookingsCount }} times</span><br>
                </div>
                <div class="card">

                    <div class="card-body">
                        <!-- Display package name here -->
                        <h5 class="card-title">Book This Tour</h5>

                        @if(!$isFullyBooked && !$isExpired)
                        <!-- Begin Booking Form -->
                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="pb-3">
                                        <label for="start_date" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date"
                                            min="{{ $package->start_date}}" max="{{ $package->end_date }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pb-3">
                                        <label for="end_date" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date"
                                            min="{{ $package->start_date}}" max="{{ $package->end_date}}" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <!-- Adults Selector -->

                                <div class="col-md-6">
                                    <div class="pb-3">
                                        <label class="form-label">Adults</label>
                                        <div class="input-group">
                                            <button type="button" id="adultsMinus"
                                                class="btn btn-outline-primary">-</button>
                                            <input type="text" id="adults" name="adults"
                                                class="form-control text-center" value="0" readonly>
                                            <button type="button" id="adultsPlus"
                                                class="btn btn-outline-primary">+</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Youth Selector -->
                                {{--
                                <div class="col-md-4">
                                    <div class="pb-3">
                                        <label class="form-label">Youth</label>
                                        <div class="input-group">
                                            <button type="button" id="youthMinus"
                                                class="btn btn-outline-primary">-</button>
                                            <input type="text" id="youth" name="youth" class="form-control text-center"
                                                value="0" readonly>
                                            <button type="button" id="youthPlus"
                                                class="btn btn-outline-primary">+</button>
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Children Selector -->
                                <div class="col-md-6">
                                    <div class="pb-3">
                                        <label class="form-label">Children</label>
                                        <div class="input-group">
                                            <button type="button" id="childrenMinus"
                                                class="btn btn-outline-primary">-</button>
                                            <input type="text" id="children" name="children"
                                                class="form-control text-center" value="0" readonly>
                                            <button type="button" id="childrenPlus"
                                                class="btn btn-outline-primary">+</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Notification for Exceeding Max Persons -->
                            <div id="exceedMaxPersonsNotice" class="alert alert-warning d-none" role="alert">
                                {{-- Exceeding the package's max allowed persons. Additional person price: ₱{{
                                $package->additional_person_price }} --}}
                                Exceeding the package's max allowed persons. Additional person price will be needed.
                            </div>

                            <!-- Additional Fees Section -->
                            <div id="additionalFees" class="additional-fees-section mt-2 d-none">
                                <h4 class="form-control text-center text-green mb-3"
                                    style="background-color: lightgreen; color: green;">Additional Fees</h4>
                                <!-- Row for Additional Fees Display -->
                                <div class="row">
                                    <!-- Additional Fee for Adults -->
                                    <div class="col-md-6">
                                        <div class="">
                                            <p id="additionalAdultFeeText" class="text-center"
                                                style="background-color: #e6f9e6; color: green; border-color: green;">
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Additional Fee for Youth -->
                                    {{-- <div class="col-md-4">
                                        <div class="pb-3">
                                            <p id="additionalYouthFeeText" class="text-center"
                                                style="background-color: #e6f9e6; color: green; border-color: green;">
                                            </p>
                                        </div>
                                    </div> --}}

                                    <!-- Additional Fee for Children -->
                                    <div class="col-md-6">
                                        <div class="pb-3">
                                            <p id="additionalChildFeeText" class="text-center"
                                                style="background-color: #e6f9e6; color: green; border-color: green;">
                                            </p>
                                        </div>
                                    </div>

                                </div>

                                <!-- Row for Person Selectors -->
                                <div class="row">
                                    <!-- Adults Selector -->
                                    <div class="col-md-6">
                                        <div class="pb-3">
                                            <label class="form-label">Adults</label>
                                            <div class="input-group">
                                                <button type="button" id="additionalFeeAdultsMinus"
                                                    class="btn btn-outline-primary">-</button>
                                                <input type="text" id="additionalFeeAdults" name="additionalFeeAdults"
                                                    class="form-control text-center" value="0" readonly>
                                                <button type="button" id="additionalFeeAdultsPlus"
                                                    class="btn btn-outline-primary">+</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-4">
                                        <div class="pb-3">
                                            <label class="form-label">Youth</label>
                                            <div class="input-group">
                                                <button type="button" id="additionalFeeYouthMinus"
                                                    class="btn btn-outline-primary">-</button>
                                                <input type="text" id="additionalFeeYouth" name="additionalFeeYouth"
                                                    class="form-control text-center" value="0" readonly>
                                                <button type="button" id="additionalFeeYouthPlus"
                                                    class="btn btn-outline-primary">+</button>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <!-- Children Selector -->
                                    <div class="col-md-6">
                                        <div class="pb-3">
                                            <label class="form-label">Children</label>
                                            <div class="input-group">
                                                <button type="button" id="additionalFeeChildrenMinus"
                                                    class="btn btn-outline-primary">-</button>
                                                <input type="text" id="additionalFeeChildren"
                                                    name="additionalFeeChildren" class="form-control text-center"
                                                    value="0" readonly>
                                                <button type="button" id="additionalFeeChildrenPlus"
                                                    class="btn btn-outline-primary">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Horizontal line for visual separation -->
                            <hr style="border-top: 1px solid #ccc; margin-bottom: 1rem;" />
                            <h5>Choose Your Pickup and Drop-off Locations</h6>
                                <!-- Your input fields for pickup and drop-off locations -->
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="pickupLocation">Pickup Location</label>
                                        <input type="text" id="pickupLocation" class="form-control"
                                            placeholder="Enter a location">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dropoffLocation">Drop-off Location</label>
                                        <input type="text" id="dropoffLocation" class="form-control"
                                            placeholder="Enter a location">
                                    </div>
                                </div>

                                <!-- Hidden inputs to store the latitude and longitude -->
                                <input type="hidden" id="pickupLatitude" name="pickup_latitude">
                                <input type="hidden" id="pickupLongitude" name="pickup_longitude">
                                <input type="hidden" id="dropoffLatitude" name="dropoff_latitude">
                                <input type="hidden" id="dropoffLongitude" name="dropoff_longitude">

                                <!-- Map container -->
                                <div id="map" style="height: 400px;"></div>


                                <!-- Hidden inputs to store package details -->
                                <input type="hidden" name="package_id" value="{{ $package->id }}">
                                <input type="hidden" name="package_price" id="package_price"
                                    value="{{ $package->price }}">

                                <!-- Dynamic Total Price Display -->
                                <!-- Inside your card body, after the form -->
                                <div id="totalPriceContainer" class="mt-3 d-flex justify-content-between">
                                    <h5>Total Price:</h5>
                                    <input type="hidden" id="totalPriceInput" name="totalPrice">
                                    <h3 id="totalPrice" name="totalPrice" class="text-danger"></h3>
                                </div>


                                <!-- Include additional fields as necessary -->
                                <button type="submit" class="btn btn-primary">Book Now</button>
                        </form>
                        <!-- End Booking Form -->
                        @elseif($isFullyBooked)
                        <div class="alert alert-info" role="alert">
                            This package is fully booked.
                        </div>
                        @elseif($isExpired)
                        <div class="alert alert-info" role="alert">
                            This package is no longer available.
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const exceedMaxPersonsNotice = document.getElementById('exceedMaxPersonsNotice');
        const additionalFees = document.getElementById('additionalFees');

        const packageDetails = {
            maxPersons: {{ $package->max_persons }},
            pricePerDay: {{ $package->price }},
            additionalAdultPrice: parseInt({{ $package->addtional_adult_price }}),
            // additionalYouthPrice: parseInt({{ $package->addtional_youth_price }}),
            additionalChildPrice: parseInt({{ $package->addtional_children_price }}),

        };

        function calculateTotalPrice() {
            const startDate = new Date(document.getElementById('start_date').value);
            const endDate = new Date(document.getElementById('end_date').value);
            const totalDays = Math.round((endDate - startDate) / (1000 * 60 * 60 * 24)); // +1 to include both start and end dates

            if (!isNaN(totalDays) && totalDays > 0) {
                const basePrice = totalDays * packageDetails.pricePerDay;
                const totalPersons = getTotalPersons();
                let extraFees = 0;

                if (totalPersons >= packageDetails.maxPersons) {
                    const additionalAdults = parseInt(document.getElementById('additionalFeeAdults').value, 10) || 0;
                    // const additionalYouth = parseInt(document.getElementById('additionalFeeYouth').value, 10) || 0;
                    const additionalChildren = parseInt(document.getElementById('additionalFeeChildren').value, 10) || 0;

                    console.log("packageDetails.additionalAdultPrice", packageDetails.additionalAdultPrice)
                    // console.log("packageDetails.additionalYouthPrice", packageDetails.additionalYouthPrice)
                    console.log("packageDetails.additionalChildPrice", packageDetails.additionalChildPrice)

                    extraFees += additionalAdults * packageDetails.additionalAdultPrice;
                    // extraFees += additionalYouth * packageDetails.additionalYouthPrice;
                    extraFees += additionalChildren * packageDetails.additionalChildPrice;

                    extraFees; // Multiply by the number of days
                }

                const totalPrice = basePrice + extraFees;
                console.log("totalPrice", totalPrice);
                
                document.getElementById('totalPrice').textContent = `₱${totalPrice.toFixed(2)}`;
                document.getElementById('totalPriceInput').value = totalPrice.toFixed(2);
            } else {
                document.getElementById('totalPrice').textContent = `₱0`;
                // Set the value of the hidden input field to 0 if totalDays is not valid
                document.getElementById('totalPriceInput').value = '0.00';
            }
        }

        document.getElementById('additionalAdultFeeText').textContent = `₱${packageDetails.additionalAdultPrice} per adult`;
        // document.getElementById('additionalYouthFeeText').textContent = `₱${packageDetails.additionalYouthPrice} per youth`;
        document.getElementById('additionalChildFeeText').textContent = `₱${packageDetails.additionalChildPrice} per child`;

        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('start_date').addEventListener('change', calculateTotalPrice);
            document.getElementById('end_date').addEventListener('change', calculateTotalPrice);

            ['adults', 'children', 'additionalFeeAdults', 'additionalFeeChildren'].forEach(category => {
                document.getElementById(`${category}Minus`).addEventListener('click', () => changePersonCount(category, false));
                document.getElementById(`${category}Plus`).addEventListener('click', () => changePersonCount(category, true));
            });

            calculateTotalPrice(); // Initial calculation on page load
        });

        function changePersonCount(category, isIncreasing) {
            const input = document.getElementById(category);
            let currentValue = parseInt(input.value, 10) || 0;
            currentValue = isIncreasing ? currentValue + 1 : Math.max(currentValue - 1, 0);
            input.value = currentValue;

            if (getTotalPersons() >= packageDetails.maxPersons) {
                // Disable the childrenPlus button
                document.getElementById('adultsPlus').disabled = true;
                // document.getElementById('youthPlus').disabled = true;
                document.getElementById('childrenPlus').disabled = true;
                exceedMaxPersonsNotice.classList.remove('d-none');
                additionalFees.classList.remove('d-none');
            } else {
                // Enable the childrenPlus button if it was disabled
                document.getElementById('adultsPlus').disabled = false;
                // document.getElementById('youthPlus').disabled = false;
                document.getElementById('childrenPlus').disabled = false;
                exceedMaxPersonsNotice.classList.add('d-none');
                additionalFees.classList.add('d-none');
            }

            calculateTotalPrice();
        }

        function getTotalPersons() {
            const adultsCount = parseInt(document.getElementById('adults').value, 10) || 0;
            // const youthCount = parseInt(document.getElementById('youth').value, 10) || 0;
            const childrenCount = parseInt(document.getElementById('children').value, 10) || 0;
            return adultsCount + childrenCount; // This does not include additional fees
        }

        


        document.getElementById('start_date').addEventListener('change', calculateTotalPrice);
        // endDateInput.addEventListener('change', calculateTotalPrice);
        calculateTotalPrice();
    </script>
    <script>
        let map;
        let geocoder;
        let pickupMarker;
        let dropoffMarker;

        // Initialize and add the map
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 16.616003, lng: 120.316712 },
                zoom: 13,
                disableDefaultUI: true
            });

            geocoder = new google.maps.Geocoder();

            // Autocomplete for pickup and drop-off inputs
            const pickupInput = document.getElementById('pickupLocation');
            const dropoffInput = document.getElementById('dropoffLocation');

            const pickupAutocomplete = new google.maps.places.Autocomplete(pickupInput);
            const dropoffAutocomplete = new google.maps.places.Autocomplete(dropoffInput);

            pickupAutocomplete.bindTo('bounds', map);
            dropoffAutocomplete.bindTo('bounds', map);

            // Place changed event for pickup location
            pickupAutocomplete.addListener('place_changed', function() {
                const place = pickupAutocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }
                setMarker(place, pickupMarker, 'pickup');
            });

            // Place changed event for drop-off location
            dropoffAutocomplete.addListener('place_changed', function() {
                const place = dropoffAutocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }
                setMarker(place, dropoffMarker, 'dropoff');
            });
        }

        // Sets the marker on the map
        function setMarker(place, marker, type) {
            if (marker && marker.setPosition) {
                marker.setPosition(place.geometry.location);
            } else {
                marker = new google.maps.Marker({
                    map: map,
                    position: place.geometry.location,
                    draggable: true
                });
            }

            if (type === 'pickup') {
                pickupMarker = marker;
            } else {
                dropoffMarker = marker;
            }

            // Event listener for marker drag end
            google.maps.event.addListener(marker, 'dragend', function() {
                updateLocationInputs(marker.getPosition(), type);
            });

            // Update the input fields
            updateLocationInputs(place.geometry.location, type);

            map.panTo(place.geometry.location);
            map.setZoom(13);
        }

        // Updates the hidden input fields with the latitude and longitude
        function updateLocationInputs(latLng, type) {
            if (type === 'pickup') {
                document.getElementById('pickupLatitude').value = latLng.lat();
                document.getElementById('pickupLongitude').value = latLng.lng();
                console.log(document.getElementById('pickupLatitude'));
                console.log(document.getElementById('pickupLongitude'));
            } else {
                document.getElementById('dropoffLatitude').value = latLng.lat();
                document.getElementById('dropoffLongitude').value = latLng.lng();
                console.log(document.getElementById('dropoffLatitude'), document.getElementById('dropoffLongitude'));
            }
        }

        // Load the map script with the API key and the initMap callback
        function loadScript() {
            var script = document.createElement('script');
            script.src = `https://maps.googleapis.com/maps/api/js?key=${'{{ env("GOOGLE_MAPS_API_KEY") }}'}&libraries=places&callback=initMap`;
            script.async = true;
            script.defer = true;
            document.head.appendChild(script);
        }

        document.addEventListener('DOMContentLoaded', loadScript);
    </script>



    @include('components.homepage.footer')
</x-app-layout>