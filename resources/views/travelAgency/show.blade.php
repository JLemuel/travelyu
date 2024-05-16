<style>
    .cover-photo {
        position: relative;
        height: 250px;
        overflow: hidden;
    }

    .cover-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-image-wrapper {
        position: absolute;
        top: 175px;
        left: 50%;
        transform: translateX(-50%);
        width: 150px;
        height: 150px;
        border: 5px solid white;
        border-radius: 50%;
        overflow: hidden;
        z-index: 1;
    }

    .profile-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card {
        margin-top: 75px;
        border-radius: 0.5rem;
    }

    .card-body {
        padding: 2rem;
    }

    .card-title {
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .card-text {
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }

    .shadow-sm {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }

    .payment-methods i {
        margin-right: 0.5rem;
    }

    /* FontAwesome icons */
    .fas.fa-mobile-alt {
        color: #50b948;
        /* Green for Gcash */
    }

    .fas.fa-university {
        color: #007bff;
        /* Blue for Bank Account */
    }
</style>

<x-app-layout>
    <div class="">
        <!-- Cover Photo Section -->
        <div class="cover-photo mb-4">
            <img src="{{ asset('assets/image1.jpg') }}" class="img-fluid w-100" alt="Cover Photo">
        </div>

        <!-- Profile Image -->
        <div class="profile-image-wrapper">
            @if($travelAgency->profile_image)
            <img src="{{ asset('storage/' . $travelAgency->profile_image) }}"
                class="profile-image img-fluid rounded-circle" alt="{{ $travelAgency->agency_name }}">
            @else
            <img src="https://via.placeholder.com/150" class="profile-image img-fluid rounded-circle"
                alt="Default Image">
            @endif
        </div>

        <!-- Profile and Info Section -->
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h2 class="card-title">{{ $travelAgency->agency_name }}</h2>
                    <p class="card-text"><strong>Contact Number:</strong> {{ $travelAgency->contact_number }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ $travelAgency->email }}</p>
                    <p class="card-text"><strong>Tagline:</strong> {{ $travelAgency->tagline }}</p>
                    <p class="card-text"><strong>Established:</strong> {{ $travelAgency->establishment_date }}</p>

                    <div class="payment-methods mt-4">
                        <h6>Payment Options:</h6>
                        @if ($travelAgency->gcash_number)
                        <p class="card-text"><i class="fas fa-mobile-alt"></i> Gcash: {{ $travelAgency->gcash_number }}
                        </p>
                        @endif
                        @if ($travelAgency->bank_account_number)
                        <p class="card-text"><i class="fas fa-university"></i> Bank Account: {{
                            $travelAgency->bank_account_number }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</x-app-layout>