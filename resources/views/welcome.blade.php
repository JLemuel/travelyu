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
            padding-bottom: 20px;
            background-color: var(--green-contrast-text);
            /* Optional: light background for the form area */
            border-radius: 10px;
            /* Optional: rounded corners for the form area */
            margin-top: -100px;
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

            .btn-primary {
                font-size: 1rem;
                padding: .375rem .75rem;
                margin-top: .8rem;
            }
        }
    </style>
    </style>
    <div class="container booking-container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <form class="form">
                    <div class="row mb-3">
                        <!-- Text indicators and form controls... -->
                        <div class="col-lg-2 mb-3">
                            <span class="input-indicator">Destination</span>
                            <select name="destination" id="destination" class="form-control custom-select">
                                <option value="">Destination</option>
                                <option value="San Fernando">San Fernando (Capital)</option>
                                <option value="Agoo">Agoo</option>
                                <option value="Bauang">Bauang</option>
                                <option value="Caba">Caba</option>
                                <option value="Luna">Luna</option>
                                <option value="Rosario">Rosario</option>
                                <option value="San Juan">San Juan</option>
                                <option value="Aringay">Aringay</option>
                                <option value="Balaoan">Balaoan</option>
                                <option value="Bangar">Bangar</option>
                                <option value="Santo Tomas">Santo Tomas</option>
                                <option value="Tubao">Tubao</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <span class="input-indicator">Select Type</span>
                            <select name="type" id="type" class="form-control custom-select">
                                <option value="">Select Type</option>
                                <option value="adventure">Adventure</option>
                                <option value="beach">Beach</option>
                                <option value="cultural">Cultural Sites</option>
                                <option value="food_tour">Food Tour</option>
                                <option value="historical">Historical Sites</option>
                                <option value="nature">Nature and Parks</option>
                                <option value="night_life">Night Life</option>
                                <option value="relaxation">Relaxation</option>
                                <option value="sports">Sports</option>
                                <option value="water_activities">Water Activities</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <span class="input-indicator">Start Date</span>
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <div class="col-lg-2 mb-3">
                            <span class="input-indicator">End Date</span>
                            <input type="date" class="form-control" name="end_date">
                        </div>
                        <div class="col-lg-2 mb-3">
                            <span class="input-indicator">No. of People</span>
                            <input type="text" class="form-control" placeholder="Enter number">
                        </div>
                        <div class="col-lg-2 mb-3">
                            <input type="submit" class="btn btn-primary btn-block" value="Book Now">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-tour-packages :packages="$destinations" title="Popular Destinations" subtitle="Destination" />

    <x-tour-packages :packages="$activities" title="Popular Activities" subtitle="Activities" />

    @include('components.homepage.services')

    @include('components.homepage.footer')
</x-app-layout>