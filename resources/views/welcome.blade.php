<x-app-layout>
    <style>
        <style>.booking-form-container {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .booking-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }

        .booking-form-group {
            display: flex;
            align-items: center;
        }

        .booking-form .form-control,
        .booking-form .btn {
            flex: 1;
            min-width: 150px;
        }

        .booking-form .input-group-text {
            background-color: #4CAF50;
            border: none;
            color: #fff;
        }

        .booking-form .form-control {
            border: 2px solid #4CAF50;
            border-radius: 20px;
        }

        .booking-form .btn-green {
            background-color: #4CAF50;
            border: none;
            color: #fff;
            border-radius: 20px;
            padding: 10px 20px;
        }

        .booking-form .btn-green:hover {
            background-color: #388E3C;
        }

        /* Ensure labels are aligned horizontally */
        .form-label {
            flex-basis: 100%;
            text-align: left;
            margin-bottom: 5px;
        }

        @media (max-width: 768px) {

            .booking-form .input-group,
            .booking-form .btn-green {
                flex-basis: 100%;
            }
        }
    </style>
    <div class="container">
        <div class="booking-form-container ">
            <form class="booking-form ">
                <div class="booking-form-group">
                    <label for="destination" class="form-label">Enter Destination</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" id="destination" class="form-control" placeholder="Enter Destination">
                    </div>
                </div>

                <label for="people" class="form-label">No. of People</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                    </div>
                    <select class="form-control" id="people">
                        <option selected>1</option>
                        <option>2</option>
                        <!-- More options -->
                    </select>
                </div>

                <label for="checkin-date" class="form-label">Check-in Date</label>
                <div class="input-group">
                    <input type="text" id="checkin-date" class="form-control" placeholder="MM/DD/YYYY">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                </div>

                <label for="checkout-date" class="form-label">Check-out Date</label>
                <div class="input-group">
                    <input type="text" id="checkout-date" class="form-control" placeholder="MM/DD/YYYY">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-green">INQUIRE NOW</button>
            </form>
        </div>
    </div>
    <x-tour-packages :packages="$destinations" title="Popular Destinations" subtitle="Destination" />

    <x-tour-packages :packages="$activities" title="Popular Activities" subtitle="Activities" />

    @include('components.homepage.services')

    @include('components.homepage.footer')
</x-app-layout>