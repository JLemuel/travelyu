<div class="row">
    @forelse($destination->packages as $package)
    <h2 class="text-center mb-4">Packages for {{ $destination->name }}</h2>
    <div class="col-md-4 mb-3">
        <div class="card package-card">
            <!-- Package Image -->
            @if($package->image)
            <img src="{{ asset('storage/' . $package->image[0]) }}" class="card-img-top" alt="{{ $package->name }}">
            @endif

            <!-- Package Info -->
            <div class="card-body">
                <h5 class="card-title">{{ $package->name }}</h5>
                <!-- Location -->
                <p class="card-text location">
                    <i class="bi bi-geo-alt-fill"></i> {{ $destination->city }}, {{ $destination->province }}
                </p>
                <div class="package-details mb-2">
                    <span class="days"><i class="bi bi-calendar3"></i> {{ $package->duration }} days</span>
                    <span class="price">From ₱{{ $package->price }}</span>
                </div>
                <p class="card-text">{{ $package->description }}</p>
                <a href="{{ route('packages.show', $package->id) }}" class="btn btn-primary">Explore</a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info text-center" role="alert">
            <h3>{{ $destination->description }}</h3>
        </div>
        {{-- <div class="alert alert-info text-center" role="alert">
            No packages available for {{ $destination->name }} at the moment.
        </div> --}}
        <!-- Display destination description -->

    </div>
    @endforelse
</div>