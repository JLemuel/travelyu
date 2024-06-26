<style>
    .card-body .booking-details p,
    .card-body .payment-methods p {
        margin-bottom: 0.5rem;
    }

    .card-body .payment-methods h6 {
        margin-top: 1rem;
        margin-bottom: 0.75rem;
    }

    .card-actions {
        margin-top: 1.5rem;
    }

    .card-actions .btn {
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
<div class="row">
    @if(isset($bookings) && $bookings->count() > 0)
    @foreach($bookings as $booking)
    <div class="card mb-4 position-relative">
        @if($booking->status === 'pending' && empty($booking->receipt))
        <div class="position-absolute top-0 end-0">
            <span class="badge bg-warning text-dark m-2">Pending Verification, (Pending Payment)</span>
        </div>
        @elseif($booking->status === 'pending' && !empty($booking->receipt))
        <div class="position-absolute top-0 end-0">
            <span class="badge bg-info text-white m-2">Receipt Submitted, Pending Verification</span>
        </div>
        @elseif($booking->status === 'verified')
        <div class="position-absolute top-0 end-0">
            <span class="badge bg-success text-white m-2">Verified</span>
        </div>
        @endif

        <div class="row no-gutters">
            <!-- Package Image Column -->
            <div class="col-lg-4">
                @if($booking->package->image && is_array($booking->package->image) && count($booking->package->image) >
                0)
                @php
                $randomImage = $booking->package->image[array_rand($booking->package->image)];
                @endphp
                <img src="{{ asset('storage/' . $randomImage) }}" class="w-100" alt="{{ $booking->package->name }}"
                    style="max-height: 200px; object-fit: cover;">
                @else
                <img src="https://via.placeholder.com/150" class="w-100" alt="Default Image"
                    style="max-height: 200px; object-fit: cover;">
                @endif
            </div>

            <div class="col-lg-6">
                <div class="card-body">
                    <h5 class="card-title">{{ $booking->package->name ?? 'N/A' }}</h5>
                    <div class="card-text">
                        <div class="booking-details">
                            <p>Check-in: {{ $booking->check_in->format('M d, Y') }}</p>
                            <p>Check-out: {{ $booking->check_out->format('M d, Y') }}</p>
                            <p>Total Price: ₱{{ number_format($booking->total_price, 2) }}</p>
                            <!-- You can uncomment the following lines if you want to display them -->
                            <!-- p>Adults: {{ $booking->adults_count }}</p>
                            <p>Youths: {{ $booking->youth_count }}</p>
                            <p>Children: {{ $booking->children_count }}</p>
                            <p>Additional Adults: {{ $booking->additional_adults_count }}</p>
                            <p>Additional Youths: {{ $booking->additional_youth_count }}</p>
                            <p>Additional Children: {{ $booking->additional_children_count }}</p>
                            <p>Notes: {{ $booking->notes ?? 'N/A' }}</p -->
                        </div>
                        {{-- <div class="payment-methods">
                            <h6>Payment Options:</h6>
                            @if ($booking->package->gcash_number)
                            <p><i class="fas fa-mobile-alt"></i> Gcash: {{ $booking->package->gcash_number }}</p>
                            @endif
                            @if ($booking->package->bank_account_number)
                            <p><i class="fas fa-university"></i> Bank Account: {{ $booking->package->bank_account_number
                                }}</p>
                            @endif
                        </div> --}}
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#uploadReceiptModal-{{ $booking->id }}">
                                Upload Payment Receipt
                            </a>
                            <a href="{{ route('packages.details', $booking->package->id) }}" class="btn btn-secondary">
                                View Package Details
                            </a>
                        </div>
                    </div>
                </div>


                {{-- <div class="card-footer">
                    <small class="text-muted">Booking ID: {{ $booking->id }}</small>
                </div> --}}
                <div class="card-footer">
                    <small class="text-muted">
                        Travel Agency:
                        @if($booking->package->travelAgency)
                        <a href="{{ route('travelAgency.show', $booking->package->travelAgency->id) }}">
                            {{ $booking->package->travelAgency->agency_name ?? 'N/A' }}
                        </a>
                        @else
                        N/A
                        @endif
                    </small>
                </div>

            </div>
        </div>
    </div>

    <!-- Upload Receipt Modal -->
    <div class="modal fade" id="uploadReceiptModal-{{ $booking->id }}" tabindex="-1"
        aria-labelledby="uploadReceiptModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadReceiptModalLabel">Upload Payment Receipt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('bookings.uploadReceipt', $booking->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="receiptFile" class="form-label">Receipt File</label>
                            <input class="form-control" type="file" id="receiptFile" name="receiptFile" required
                                onchange="previewFile(this, 'previewImage-{{ $booking->id }}')">
                            <!-- Image preview placeholder -->
                            <img id="previewImage-{{ $booking->id }}" src="" class="img-fluid mt-3"
                                style="width: 100%; height: auto; display: none;">
                        </div>
                        <button type="submit" class="btn btn-success">Upload Receipt Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endforeach

{{--
<!-- Bootstrap Toast -->
<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
    <div style="z-index: 9999; position: absolute; bottom: 5rem; right: 0;">
        <!-- Toast -->
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="notificationToast">
            <div class="toast-header">
                <strong class="mr-auto">Notification</strong>
                <small>Just now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <!-- Dynamic message will be inserted here -->
            </div>
        </div>
    </div>
</div> --}}


<script>
    document.addEventListener('DOMContentLoaded', function() {
                    var toastElList = [].slice.call(document.querySelectorAll('.toast'));
                    var toastList = toastElList.map(function(toastEl) {
                        // Bootstrap 5 toast initialization
                        return new bootstrap.Toast(toastEl, {
                            autohide: true,
                            delay: 5000
                        });
                    });

                    @if(session('success'))
                        var toastElement = document.getElementById('notificationToast');
                        toastElement.querySelector('.toast-body').textContent = "{{ session('success') }}";
                        toastElement.classList.remove('hide'); // Show the toast
                        toastList[0].show(); // Replace with the index of your toast
                    @endif

                    @if(session('error'))
                        var toastElement = document.getElementById('notificationToast');
                        toastElement.querySelector('.toast-body').textContent = "{{ session('error') }}";
                        toastElement.classList.remove('hide'); // Show the toast
                        toastList[0].show(); // Replace with the index of your toast
                    @endif
                });

                function previewFile(input, previewId) {
                    var file = input.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var previewImage = document.getElementById(previewId);
                            previewImage.src = e.target.result;
                            previewImage.style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                    }
                }
</script>

@else
<p>You have no bookings.</p>
@endif
</div>