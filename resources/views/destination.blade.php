<style>
    /* .image-collage {
        position: relative;
    } */

    .collage-item {
        width: 100%;
        /* Adjust width as needed */
        max-width: 100%;
        margin-bottom: 15px;
        /* Space between images */
        display: block;
        object-fit: cover;
    }

    /* Individual image styles for the collage effect */
    .collage-item:nth-child(1) {
        position: absolute;
        top: 350px;
        left: 0;
        transform: rotate(-5deg);
    }

    .collage-item:nth-child(2) {
        position: absolute;
        top: 250px;
        right: 0;
        transform: rotate(5deg);
    }

    .collage-item:nth-child(3) {
        position: absolute;
        top: 100px;
        left: 20%;
        transform: rotate(-3deg);
    }

    .image-collage img {
        border-radius: 10px;
        width: 50%;
        /* Rounded corners for images */
    }

    /* Continue with :nth-child() for more images if necessary */
</style>

<x-app-layout>
    <div class="container" style="padding-top: 7rem">
        <div class="row">
            <!-- Map Component Column -->
            <div class="col-12 col-md-6">
                <!-- These headings will only show on xs to sm screens -->
                <h2 class="fw-bold text-lg mb-4 d-md-none">Discover La Union</h2>
                <h4 class="text-muted mb-4 d-md-none">Explore the Hidden Gems</h4>
                <!-- This will take full width on xs to md screens, and half on lg screens -->
                <x-elyu-map route-name="destinations.show" />
            </div>

            <!-- Collage of Images Column -->
            <div class="col-12 col-md-6 d-none d-md-block" style=" position: relative;">
                <!-- This will take full width on xs to md screens, and half on lg screens -->
                <h2 class="fw-bold text-lg mb-4">Discover La Union</h2>
                <h4 class="text-muted mb-4">Explore the Hidden Gems</h4>
                <div class="image-collage">
                    <!-- Replace these with actual image tags or a component that generates a collage -->
                    <img class="collage-item img-fluid" src="{{ asset('/assets/one.jpg') }}" alt="Image 1">
                    <img class="collage-item" src="{{ asset('/assets/three.jpg') }}" alt="Image 2" class="img-fluid">
                    <img class="collage-item" src="{{ asset('/assets/two.jpg') }}" alt="Image 3" class="img-fluid">
                    <!-- Add more images as needed -->
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</x-app-layout>