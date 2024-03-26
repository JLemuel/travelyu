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
                    <img class="collage-item"
                        src="https://images.unsplash.com/photo-1610601403310-7626f825bef5?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Image 1" class="img-fluid">
                    <img class="collage-item"
                        src="https://plus.unsplash.com/premium_photo-1669640020567-ef5248fbd116?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Image 2" class="img-fluid">
                    <img class="collage-item"
                        src="https://images.unsplash.com/photo-1584467541268-b040f83be3fd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Image 3" class="img-fluid">
                    <!-- Add more images as needed -->
                </div>
            </div>
        </div>
    </div>

    @include('components.homepage.footer')
</x-app-layout>