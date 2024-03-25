<style>
    .success-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .success-header {
        background-color: #28a745;
        /* Bootstrap's success green */
        color: #fff;
        padding: 20px;
        border-radius: 10px 10px 0 0;
        margin: -20px -20px 20px -20px;
        /* Align with outer container edges */
    }

    .success-body {
        text-align: center;
    }

    .success-icon {
        color: #28a745;
        /* Echoing the green theme */
        font-size: 48px;
        /* Large icon for emphasis */
    }

    .btn-success-custom {
        background-color: #28a745;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
        transition: background-color 0.2s;
    }

    .btn-success-custom:hover {
        background-color: #218838;
        /* A slightly darker green on hover */
    }
</style>
<x-app-layout>

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container" style="padding-top: 5rem">
            <div class="success-container">
                <div class="success-header">
                    <h1>Booking Confirmed</h1>
                </div>
                <div class="success-body">
                    <i class="success-icon bi bi-check-circle-fill"></i>
                    <!-- You can replace with an actual icon from Bootstrap Icons -->
                    <h2 class="my-4">Thank You for Your Booking!</h2>
                    <p>Your booking has been successfully processed. We're excited to have you aboard and look forward
                        to providing you with an unforgettable experience.</p>
                    <a href="/profile" class="btn btn-primary mt-3">Check Your Booking</a>
                </div>
            </div>

        </div>
    </div>
    <!-- About End -->

    @include('components.homepage.footer')
</x-app-layout>