<div>
    @if(isset($bookings) && $bookings->count() > 0)
        @foreach($bookings as $booking)
            <div class="card mb-4">
                <div class="row no-gutters">
                    <!-- Package Image Column -->
                    <div class="col-lg-4">
                        @if($booking->package->image && is_array($booking->package->image) && count($booking->package->image) > 0)
                            @php
                                $randomImage = $booking->package->image[array_rand($booking->package->image)];
                            @endphp
                            <img src="{{ asset('storage/' . $randomImage) }}" class="w-100" alt="{{ $booking->package->name }}" style="max-height: 200px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/150" class="w-100" alt="Default Image" style="max-height: 200px; object-fit: cover;">
                        @endif
                    </div>

                    <!-- Booking Details Column -->
                    <div class="col-lg-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $booking->package->name ?? 'N/A' }}</h5>
                            <p class="card-text">
                                Check-in: {{ $booking->check_in->format('M d, Y') }}<br>
                                Check-out: {{ $booking->check_out->format('M d, Y') }}<br>
                                Total Price: ${{ number_format($booking->total_price, 2) }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Booking ID: {{ $booking->id }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>You have no bookings.</p>
    @endif
</div>
