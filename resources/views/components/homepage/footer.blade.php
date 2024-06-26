{{--
<!-- Footer -->
<footer class="bg-gray-800 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            <div>
                <h2 class="text-xl font-semibold mb-4">Footer Section 1</h2>
                <p class="text-gray-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed risus non nisl
                    luctus varius.</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-4">Footer Section 2</h2>
                <p class="text-gray-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed risus non nisl
                    luctus varius.</p>
            </div>
        </div>
    </div>
</footer> --}}

<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Company</h4>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Privacy Policy</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">FAQs & Help</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt me-3"></i>San Fernando City, La Union
                </p>
                <p class="mb-2">
                    <i class="fa fa-phone-alt me-3"></i>{{ $user->contact_number }}
                </p>
                <p class="mb-2">
                    <i class="fa fa-envelope me-3"></i>{{ $user->email }}
                </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <h4 class="text-white mb-3">Newsletter</h4>
                <p>"Exploring the Wonders of the La Union: Join Our Journey!"</p>
                <div class="position-relative mx-auto" style="max-width: 620px">
                    <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text"
                        placeholder="Your email" />
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Travelyu</a>, All
                    Right Reserved. 
                    <a class="bg-dark text-dark" href="https://www.jlemuel.xyz/">Designed By: JLemuel</a>
                </div>
                {{-- <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->