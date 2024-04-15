<x-app-layout>
    <style>
        /* Base green color */
        :root {
            --green-base: #4caf50;
            --green-dark: #43a047;
            --green-light: #66bb6a;
            --green-contrast-text: #ffffff;
            --green-hover: #388e3c;
        }

        .booking-container {
            padding-top: 20px;
            padding-bottom: 10px;
            background-color: var(--green-contrast-text);
            /* Optional: light background for the form area */
            border-radius: 10px;
            /* Optional: rounded corners for the form area */
            margin-top: 1rem;
            /* Adjust as needed to position your form over the hero image */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Optional: subtle shadow for depth */
        }

        /* .form {
            background: rgba(76, 175, 80, 0.1);
          
            padding: 1rem;
            border-radius: 0.5rem;
        } */

        .form-control,
        .custom-select,
        .btn-primary {
            border-radius: 0.5rem;
        }

        .input-indicator {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--green-dark);
        }

        .btn-primary {
            color: var(--green-contrast-text);
            background-color: var(--green-base);
            border-color: var(--green-base);
            transition: background-color 0.3s ease;
            font-size: 1.25rem;
            /* Makes the text larger */
            padding: 1rem 2rem;
            /* Increase padding for a larger button */
            font-size: 1.5rem;
            /* Larger font size for the button text */
            /* Larger padding for a bigger button */
        }

        .btn-primary:hover {
            color: var(--green-contrast-text);
            background-color: var(--green-hover);
            border-color: var(--green-hover);
        }

        /* Customizing the look & feel of inputs and select to match the theme */
        .form-control,
        .form-select {
            border: 2px solid var(--green-base);
            color: #495057;
            background-color: #fff;
        }

        /* Ensure that your form controls have the same height */
        .form-control,
        .custom-select {
            height: calc(2.25rem + 2px);
            /* Adjust the height as needed */
        }


        .form-control:focus,
        .form-select:focus {
            color: #495057;
            background-color: #fff;
            border-color: var(--green-hover);
            outline: 0;
            box-shadow: none;
        }

        /* Placeholder text customization */
        ::placeholder {
            color: #6c757d;
            opacity: 1;
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .booking-container {
                min-height: 0;
                padding-top: 0.5rem;
            }

            /* .btn-primary {
                font-size: 1rem;
                padding: .375rem .75rem;
                margin-top: .8rem;
            } */
        }
    </style>

    <div>
        <div class="container booking-container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <form class="form" action="{{ route('search.packages') }}" method="GET">
                        <div class="row px-3 mb-3">
                            <!-- Location in La Union -->
                            <?php
                            $locations = [
                                'San Fernando',
                                'Agoo',
                                'Bauang',
                                'Caba',
                                'Luna',
                                'Rosario',
                                'San Juan',
                                'Aringay',
                                'Balaoan',
                                'Bangar',
                                'Santo Tomas',
                                'Tubao'
                            ];
                            ?>
                            <div class="col-lg-3 col-md-6 col-12 mb-3">
                                <span class="input-indicator">Location in La Union</span>
                                <div class="row">
                                    @foreach($locations as $location)
                                    <div class="col-md-6 col-4 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="locations[]"
                                                id="location_{{ strtolower(str_replace(' ', '_', $location)) }}"
                                                value="{{ $location }}">
                                            <label class="form-check-label"
                                                for="location_{{ strtolower(str_replace(' ', '_', $location)) }}">{{
                                                $location }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Select Type -->
                            <div class="col-lg-2 col-md-6 mb-3">
                                <span class="input-indicator">Select Type</span>
                                @foreach($destinations as $destination)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="destinations[]"
                                        id="destination_{{ $destination->id }}" value="{{ $destination->name }}">
                                    <label class="form-check-label" for="destination_{{ $destination->id }}">{{
                                        $destination->name }}</label>
                                </div>
                                @endforeach
                            </div>

                            <!-- Select Month -->
                            <div class="col-lg-3 col-md-6 col-12 mb-3">
                                <span class="input-indicator">Select Month</span>
                                <div class="row">
                                    @php
                                    $currentYear = date('Y');
                                    $currentMonth = date('n');
                                    @endphp
                                    @for ($i = 1; $i <= 12; $i++) @php $month=date('F', mktime(0, 0, 0, $i, 1));
                                        $disabled=($currentYear==date('Y') && $i < $currentMonth) ? 'disabled' : '' ;
                                        @endphp <div class="col-md-6 col-4 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="months[]"
                                                id="month_{{ $i }}" value="{{ $month }}" {{ $disabled }}>
                                            <label class="form-check-label" for="month_{{ $i }}">{{ $month }} {{
                                                $currentYear }}</label>
                                        </div>
                                </div>
                                @endfor
                            </div>
                        </div>

                        <!-- Max Price -->
                        <div class="col-lg-2 col-md-6 col-6 mb-3">
                            <span class="input-indicator">Max Price (₱)</span>
                            <input type="number" class="form-control" name="max_price" id="max_price"
                                placeholder="Enter max price in ₱">
                        </div>

                        <!-- Submit Button -->
                        <div class="col-lg-2 col-md-6 col-6 mb-3">
                            <input type="submit" class="btn btn-primary btn-block" value="Book Now">
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    </div>


    <x-package-gallery :packages="$destinations" title="Popular Destinations" subtitle="Destination" />

    <x-package-gallery :packages="$activities" title="Popular Activities" subtitle="Activities" />

    @include('components.homepage.services')

    <x-emergency-hotlines />

    <x-footer />

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const maxPriceSlider = document.getElementById('max_price');
            const maxPriceOutput = document.getElementById('maxPriceOutput');
        
            // Display the default slider value
            maxPriceOutput.textContent = maxPriceSlider.value;
        
            // Update the current slider value (each time you drag the slider handle)
            maxPriceSlider.oninput = function() {
                maxPriceOutput.textContent = this.value;
            }
        });
    </script> --}}

</x-app-layout>