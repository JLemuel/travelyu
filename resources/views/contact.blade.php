<x-app-layout>

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
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Send Message</button>
                </form>
            </div>

            <div class="col-md-6">
                <h2 class="text-center mb-4">Get in Touch</h2>
                <div class="contact-info mb-3">
                    <i class="bi bi-geo-alt-fill text-success me-2"></i>
                    Address: Your Address Here
                </div>
                <div class="contact-info mb-3">
                    <i class="bi bi-telephone-fill text-success me-2"></i>
                    Phone: +123 456 7890
                </div>
                <div class="contact-info mb-3">
                    <i class="bi bi-envelope-fill text-success me-2"></i>
                    Email: contact@yourwebsite.com
                </div>
                <div id="map" style="height: 300px;"></div>
            </div>
        </div>
    </div>
</x-app-layout>