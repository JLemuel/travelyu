<style>
        /* Green Theme Colors */
        .text-success {
            color: #28a745;
            /* Adjust for your desired green */
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        /* Contact Page Specific Styles */
        .contact-container {
            padding-top: 3rem;
            /* Adjust padding as needed */
        }

        .contact-info {
            font-size: 16px;
            /* Adjust font size */
            line-height: 1.5;
            /* Adjust line height */
        }
    </style>
    <div class="contact-container container py-5">
        <div class="row py-4 px-5" style="margin-top: 4rem; background-color: #f0f8ea;">
            <div class="col-md-6 mb-4">
                <h2 class="text-center mb-4">Contact Us</h2>
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Send Message</button>
                </form>
            </div>

            <div class="col-md-6">
                <h2 class="text-center mb-4">Get in Touch</h2>
                <div class="contact-info mb-3">
                    <i class="bi bi-geo-alt-fill text-success me-2"></i>
                    Address: {{ $tourist->address ?? 'San Fernando La Union' }}
                </div>
                <div class="contact-info mb-3">
                    <i class="bi bi-telephone-fill text-success me-2"></i>
                    Phone: {{ $tourist->contact_number ?? '+123 456 7890' }}
                </div>
                <div class="contact-info mb-3">
                    <i class="bi bi-envelope-fill text-success me-2"></i>
                    Email: {{ $tourist->email ?? 'contact@yourwebsite.com' }}
                </div>
                <div id="map" style="height: 300px;"></div>
            </div>
        </div>
    </div>

        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3">
                <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #28a745;">
                    <div class="toast-header" style="background-color: #218838; color: white;">
                        <strong class="me-auto">Notification</strong>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body" style="color: white;">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>



        <script>
            document.addEventListener('DOMContentLoaded', function() {
            if ({{ session('success') ? 'true' : 'false' }}) {
                var toastEl = document.getElementById('successToast');
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
            }
            });
            </script>


    <script>
    function loadScript() {
        var script = document.createElement('script');
        script.src = `https://maps.googleapis.com/maps/api/js?key=${'{{ env("GOOGLE_MAPS_API_KEY") }}'}&callback=initMap`;
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    }

    function initMap() {
        var sanFernandoLaUnion = {lat: 16.6186, lng: 120.3194};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: sanFernandoLaUnion
        });

        var marker = new google.maps.Marker({
            position: sanFernandoLaUnion,
            map: map
        });
    }

    window.onload = loadScript;
</script>
