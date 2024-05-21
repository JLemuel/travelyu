<style>
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    .card-img-top:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }

    .card-footer {
        background: rgba(255, 255, 255, 0.8);
        transition: background-color 0.3s ease-in-out;
    }

    .card-footer:hover {
        background: rgba(255, 255, 255, 1);
    }

    .btn-primary {
        transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>

<x-app-layout>
    <!-- Travel Agencies Section -->
    <div class="container" style="padding-top: 8rem">
        <div class="mb-5 text-center">
            <h2 class="display-4">Explore Our Travel Agencies</h2>
            <p class="lead">Discover your next great adventure with trusted agencies</p>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($travelAgencies as $agency)
            <div class="col">
                <div class="shadow-sm card h-100">

                    <img src="{{ $agency->profile_image ? asset('storage/profile_images/' . basename($agency->profile_image)) : asset('assets/image1.jpg') }}"
                        alt="{{ $agency->name ?? 'Travel Agency' }}"
                        style="height: 200px; width: 100%; object-fit: cover;">


                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('travelAgency.show', $agency->id) }}">
                                {{ $agency->agency_name }}
                            </a>
                        </h5>

                        <p class="card-text">{{ $agency->tagline ?? 'i love philippines' }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('travel-agencies.packages', ['id' => $agency->id]) }}"
                            class="btn btn-primary">Explore Packages</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <x-footer />
</x-app-layout>