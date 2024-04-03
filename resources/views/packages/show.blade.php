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
            <div class="col-md-8">
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
                        <div class="card mb-3">
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
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <!-- Display package name here -->
                        <h5 class="card-title">Book This Tour</h5>
                        <!-- Begin Booking Form -->
                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                    min="{{ $package->start_date}}" max="{{ $package->end_date }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    min="{{ $package->start_date}}" max="{{ $package->end_date}}" required>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="adults" class="form-label">Persons</label>
                                <select class="form-select" id="adults" name="adults" required
                                    data-price="{{ $package->price }}">
                                    <!-- Options for number of persons -->
                                </select>
                            </div> --}}

                            <!-- Price Indicator Section -->
                            <div class="row text-center mb-4">
                                <div class="col-md-4">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h5 class="card-title">Adult Price</h5>
                                            {{-- <p class="card-text">₱{{ $package->adult_price }} / person</p> --}}
                                            <p class="card-text">₱150 / person</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h5 class="card-title">Youth Price</h5>
                                            {{-- <p class="card-text">₱{{ $package->youth_price }} / person</p> --}}
                                            <p class="card-text">₱150 / person</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h5 class="card-title">Children Price</h5>
                                            {{-- <p class="card-text">₱{{ $package->child_price }} / person</p> --}}
                                            <p class="card-text">₱150 / person</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notification for Exceeding Max Persons -->
                            <div id="exceedMaxPersonsNotice" class="alert alert-warning d-none" role="alert">
                                {{-- Exceeding the package's max allowed persons. Additional person price: ₱{{
                                $package->additional_person_price }} --}}
                                Exceeding the package's max allowed persons. Additional person price: ₱200
                            </div>

                            <!-- Adults Selector -->
                            <div class="mb-3">
                                <label class="form-label">Adults</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="changeNumberOfPersons('adults', false)">-</button>
                                    <input type="text" id="adults" name="adults" class="form-control text-center"
                                        value="0" readonly>
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="changeNumberOfPersons('adults', true)">+</button>
                                </div>
                            </div>

                            <!-- Youth Selector -->
                            <div class="mb-3">
                                <label class="form-label">Youth</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="changeNumberOfPersons('youth', false)">-</button>
                                    <input type="text" id="youth" name="youth" class="form-control text-center"
                                        value="0" readonly>
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="changeNumberOfPersons('youth', true)">+</button>
                                </div>
                            </div>

                            <!-- Children Selector -->
                            <div class="mb-3">
                                <label class="form-label">Children</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="changeNumberOfPersons('children', false)">-</button>
                                    <input type="text" id="children" name="children" class="form-control text-center"
                                        value="0" readonly>
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="changeNumberOfPersons('children', true)">+</button>
                                </div>
                            </div>


                            <!-- Hidden inputs to store package details -->
                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                            <input type="hidden" name="package_price" id="package_price" value="{{ $package->price }}">

                            <!-- Dynamic Total Price Display -->
                            <!-- Inside your card body, after the form -->
                            <div id="totalPriceContainer" class="mt-3 d-flex justify-content-between">
                                <h5>Total Price:</h5>
                                <h3 id="totalPrice" class="text-danger">₱0</h3>
                            </div>


                            <!-- Include additional fields as necessary -->
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </form>
                        <!-- End Booking Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const maxPersons = {{ $package->max_persons }};
        const packagePricePerDay = {{ $package->price }};
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        const totalPriceElement = document.getElementById('totalPrice');
        const exceedMaxPersonsNotice = document.getElementById('exceedMaxPersonsNotice');
    
    
    
        function changeNumberOfPersons(category, isIncreasing) {
            const input = document.getElementById(category);
            let currentValue = parseInt(input.value, 10);
            currentValue = isIncreasing ? currentValue + 1 : currentValue - 1;
            currentValue = currentValue < 0 ? 0 : currentValue;
            input.value = currentValue;
    
            calculateTotalPrice();
        }
    
        function calculateTotalPrice() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            const totalDays = Math.max((endDate - startDate) / (1000 * 3600 * 24) + 1, 1); // Ensure at least one day

            const adultsCount = parseInt(document.getElementById('adults').value, 10);
            const youthCount = parseInt(document.getElementById('youth').value, 10);
            const childrenCount = parseInt(document.getElementById('children').value, 10);
            const totalPersons = adultsCount + youthCount + childrenCount;

                // Defined additional prices per category
            const additionalAdultPrice = 100; // Adjust as necessary
            const additionalYouthPrice = 150; // Adjust as necessary
            const additionalChildPrice = 50;  // Adjust as necessary

            let basePrice = packagePricePerDay * totalDays; // Base price calculation

            // Calculate additional fees for extra persons
            let extraFees = 0;
            if (totalPersons > maxPersons) {
                let extraAdults = Math.max(adultsCount + youthCount + childrenCount - maxPersons, 0);
                let extraYouth =  Math.max(extraAdults - adultsCount, 0);
                let extraChildren =  Math.max(extraYouth - youthCount, 0);

                if(extraAdults => 1) {
                    extraFees += extraAdults * additionalAdultPrice;
                }

                if(extraYouth => 1) {
                    extraFees += extraYouth * additionalYouthPrice;
                }

                if(extraChildren => 1) {
                    extraFees += extraChildren * additionalChildPrice;
                }

                console.log("adultsCount:", adultsCount , "extraAdults:", extraAdults, "extraFees:", extraFees )
                console.log("youthCount:", youthCount , "extraYouth:", extraYouth, "extraFees:", extraFees )
                console.log("childrenCount:", childrenCount , "extraChildren:", extraChildren, "extraFees:", extraFees )

                // Apply the extra fees across all days
                exceedMaxPersonsNotice.classList.remove('d-none');
            } else {
                exceedMaxPersonsNotice.classList.add('d-none');
            }

            console.log("total extraFees", extraFees);

            let totalPrice = basePrice + extraFees;

            totalPriceElement.textContent = `₱${totalPrice.toFixed(2)}`;
        }


        document.getElementById('start_date').addEventListener('change', calculateTotalPrice);
        endDateInput.addEventListener('change', calculateTotalPrice);
        document.getElementById('adults').addEventListener('change', calculateTotalPrice);
        document.getElementById('youth').addEventListener('change', calculateTotalPrice);
        document.getElementById('children').addEventListener('change', calculateTotalPrice);
    
        calculateTotalPrice(); // Initial calculation on page load
    </script>



    @include('components.homepage.footer')
</x-app-layout>