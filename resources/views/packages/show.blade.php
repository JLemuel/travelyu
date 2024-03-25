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
    background-image: url('path-to-your-dropdown-icon.svg'); /* Path to your dropdown icon */
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
    color: #5cb85c; /* or any color you prefer */
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
    color: #ddd; /* Color of empty star */
    margin-right: 5px;
    font-size: 1.2em;
}

.review-rating .star.filled {
    color: #ffc107; /* Color of filled star */
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
                        <i class="bi bi-star-fill text-warning"></i> <strong>Reviews:</strong> 8 reviews
                    </span>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="container">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tour-plan-tab" data-bs-toggle="tab" data-bs-target="#tour-plan"
                                type="button" role="tab" aria-controls="tour-plan" aria-selected="false">Tour
                                Plan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <!-- Include package description here -->
                            <p class="mt-4">{{ $package->description }}</p>
                        </div>
                        <div class="tab-pane fade" id="tour-plan" role="tabpanel" aria-labelledby="tour-plan-tab">
                            <div class="mt-3">
                                <!-- {!! $package->tour_plan_details !!} -->
                                <div class="accordion" id="tourPlanAccordion">
                                    @php
                                        // Assuming $package->tour_plan_details is a collection or an array of HTML content strings for each day
                                        $days = explode('<p><strong>', $package->tour_plan_details); // Split the content into days
                                        array_shift($days); // Remove the first empty element due to explode
                                    @endphp

                                    @foreach($days as $index => $dayContent)
                                        @php
                                            // Re-add the removed <p><strong> and wrap the content in a div for styling
                                            $dayContent = '<p><strong>' . $dayContent; 
                                            $dayContent = '<div class="tour-day-content">' . $dayContent . '</div>';
                                        @endphp

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingDay{{ $index }}">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDay{{ $index }}" aria-expanded="true" aria-controls="collapseDay{{ $index }}">
                                                    Day {{ $index + 1 }}
                                                </button>
                                            </h2>
                                            <div id="collapseDay{{ $index }}" class="accordion-collapse show" aria-labelledby="headingDay{{ $index }}" data-bs-parent="#tourPlanAccordion">
                                                <div class="accordion-body">
                                                    {!! $dayContent !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <!-- Example review 1 -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">John Doe</h5>
                                    <div class="review-rating">
                                        <span class="star filled">★</span>
                                        <span class="star filled">★</span>
                                        <span class="star filled">★</span>
                                        <span class="star filled">★</span>
                                        <span class="star">★</span>
                                    </div>
                                </div>
                                <p class="card-text">The tour was absolutely wonderful and exceeded our expectations. Loved every bit of it!</p>
                                <p class="text-muted">March 24, 2024</p>
                            </div>
                        </div>

                        <!-- Example review 2 -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">Jane Smith</h5>
                                    <div class="review-rating">
                                        <span class="star filled">★</span>
                                        <span class="star filled">★</span>
                                        <span class="star filled">★</span>
                                        <span class="star filled">★</span>
                                        <span class="star filled">★</span>
                                    </div>
                                </div>
                                <p class="card-text">Incredible experience! Our guide was knowledgeable and the itinerary was well planned.</p>
                                <p class="text-muted">February 14, 2024</p>
                            </div>
                        </div>

                        <!-- More reviews can be added here -->
                    </div>

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
                            <div class="mb-3">
                                <label for="adults" class="form-label">Persons</label>
                                <select class="form-select" id="adults" name="adults" required
                                    data-price="{{ $package->price }}">
                                    <!-- Options for number of persons -->
                                </select>
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
        const adultsSelect = document.getElementById('adults');
        const maxPersons = {{ $package->max_persons }};
        const packagePricePerDay = {{ $package->price }};
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        const totalPriceElement = document.getElementById('totalPrice');
    
        // Generate options dynamically for the number of adults
        for (let i = 1; i <= maxPersons; i++) {
            let option = document.createElement('option');
            option.value = i;
            option.text = i + (i > 1 ? ' people' : ' person'); // Adding "person/people" text
            adultsSelect.appendChild(option);
        }
    
        document.getElementById('start_date').addEventListener('change', function () {
            const startDate = this.value;
            const endDateInput = document.getElementById('end_date');
            endDateInput.min = startDate; // Adjust the min value for the end date
            if (endDateInput.value < startDate) {
                endDateInput.value = startDate; // Reset end date if it is before start date
            }
            calculateTotalPrice(); // Recalculate price on date change
        });
    
        function calculateTotalPrice() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            const totalDays = (endDate - startDate) / (1000 * 3600 * 24) + 1; // +1 to include both start and end dates
            const totalPrice = totalDays * packagePricePerDay;
    
            if (!isNaN(totalPrice) && totalPrice > 0) {
                totalPriceElement.textContent = `₱${totalPrice.toFixed(2)}`;
            } else {
                totalPriceElement.textContent = '₱0';
            }
        }
    
        // Event listeners to recalculate total price when input values change
        endDateInput.addEventListener('change', calculateTotalPrice);
    
        // Initial calculation on page load
        calculateTotalPrice();
    </script>

    @include('components.homepage.footer')
</x-app-layout>