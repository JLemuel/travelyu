<!-- Navbar & Hero Start -->
<style>
    
    .navbar-logo {
        height: auto;
        /* Maintain aspect ratio */
        /* width: 15rem; */
        /* Set width as desired */
        max-height: 15rem;
        /* Set maximum height as desired */
    }

    /* Make adjustments for different screen sizes */
    @media (max-width: 768px) {
        .navbar-logo {
            width: 10rem;
            /* Smaller width on smaller screens */
        }
    }

    /* Further adjustments for even smaller screens */
    @media (max-width: 480px) {
        .navbar-logo {
            width: 8rem;
            /* Even smaller width for mobile screens */
        }
    }
</style>
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0"

        style="background-color: rgba(83, 255, 83, 0.196);"> ">
        {{-- style="background-color: rgba(83, 255, 83, 0.196);"> --}}
        <a href="/" class="navbar-brand p-0 ps-0 ps-md-5">
            <img src="{{ asset('assets/travelyu_logo1.png') }}" alt="Travelyu" class="navbar-logo" />

        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('home') }}"
                    class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }} ">Home</a>


                <!-- Authentication Links -->
                @if (Route::has('login'))
                @auth

                <a href="{{ route('destination') }}"
                    class="nav-item nav-link {{ request()->routeIs('destination') ? 'active' : '' }}">Destination</a>

                <a href="{{ route('tour-packages') }}"
                    class="nav-item nav-link {{ request()->routeIs('tour-packages') ? 'active' : '' }}">Tour
                    Packages</a>

                <a href="{{ route('about') }}"
                    class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>

                <a href="{{ route('contact') }}"
                    class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>

            </div>

            <a href="{{ route('profile.edit') }}" class="nav-item nav-link">{{ Auth::user()->name }}</a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="btn btn-primary rounded-pill py-1 px-2" style="font-size: 1.2rem">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else

            <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
            @if (Route::has('register'))
            <!-- Apply button styling classes to the 'Register' link to match the 'Logout' button appearance -->
            <a href="{{ route('register') }}" class="nav-item nav-link " style="color: white;">Register</a>

            @endif

            @endauth
            @endif
        </div>
    </nav>
    @if(request()->is('home'))
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">
                        Discover the most engaging places here in La Union.
                    </h1>
                    <!-- "Explore Now" button -->
                    <a href="/destination" class="btn btn-primary rounded-pill py-2 px-4" role="button">Explore Now</a>
                </div>

            </div>
        </div>
        @endif
    </div>
    <!-- Navbar & Hero End -->
    {{-- <p class="fs-4 text-white mb-4 animated slideInDown">
        Tempor erat elitr rebum at clita diam amet diam et eos erat
        ipsum lorem sit
    </p> --}}
    {{-- <div class="position-relative w-75 mx-auto animated slideInDown">
        <!-- Search form starts here -->
        <form action="{{ route('search') }}" method="GET" class="d-flex position-relative">
            <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" name="query" type="text"
                placeholder="Where are you going today?" required>
            <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2"
                style="margin-top: 7px">
                Search
            </button>
        </form>
        <!-- Search form ends here -->
    </div> --}}