<!-- Footer Start  -->
<div class="section footer-section">

    <!-- Footer Widget Section Start -->
    <div class="footer-widget-section">

        <img class="shape-1 animation-down" src="{{ asset('assets/images/shape/shape-21.png') }}" alt="Shape">

        <div class="container">
            <div class="row">
                <!-- About / Logo Section -->
                <div class="col-lg-3 col-md-6 order-md-1 order-lg-1">
                    <div class="footer-widget">
                        <div class="widget-logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="Logo"></a>
                        </div>

                        <div class="widget-address">
                            <h4 class="footer-widget-title">Our Office</h4>
                            <p>KK 400 ST, Kigali City, Rwanda</p>
                        </div>

                        <ul class="widget-info">
                            <li>
                                <p><i class="flaticon-email"></i> 
                                    <a href="mailto:support@eduplatform.com">support@eduplatform.com</a>
                                </p>
                            </li>
                            <li>
                                <p><i class="flaticon-phone-call"></i> 
                                    <a href="tel:+1234567890">+250 782 390-919</a>
                                </p>
                            </li>
                        </ul>

                        <ul class="widget-social">
                            <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                            <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                            <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                            <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!-- Categories & Links -->
                <div class="col-lg-6 order-md-3 order-lg-2">
                    <div class="footer-widget-link">
                        <div class="footer-widget">
                            <h4 class="footer-widget-title">Popular Categories</h4>
                            <ul class="widget-link">
                                <li><a href="#">All Lessons</a></li>
                                <li><a href="#">Educational Tips</a></li>
                                <li><a href="#">Student Testimonials</a></li>
                                <li><a href="#">Meet Our Instructors</a></li>
                                <li><a href="#">Our Partners</a></li>
                            </ul>
                        </div>

                        <div class="footer-widget">
                            <h4 class="footer-widget-title">Quick Links</h4>
                            <ul class="widget-link">
                                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li><a href="#">FAQ’s</a></li>
                                <li><a href="#">Help & Support</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Subscribe -->
                <div class="col-lg-3 col-md-6 order-md-2 order-lg-3">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">Stay Updated</h4>
                        <div class="widget-subscribe">
                            <p>Subscribe to get the latest lessons, tips, and updates from our tutors.</p>
                            <div class="widget-form">
                                <form action="#" method="POST">
                                    @csrf
                                    <input type="email" name="email" placeholder="Enter your email" required>
                                    <button class="btn btn-primary btn-hover-dark">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <img class="shape-2 animation-left" src="{{ asset('assets/images/shape/shape-22.png') }}" alt="Shape">

    </div>
    <!-- Footer Widget Section End -->

    <!-- Footer Copyright -->
    <div class="footer-copyright">
        <div class="container">
            <div class="copyright-wrapper">
                <div class="copyright-link">
                    <a href="#">Terms of Service</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Sitemap</a>
                    <a href="#">Contact Us</a>
                </div>
                <div class="copyright-text">
                    <p>&copy; {{ date('Y') }} <span>EduPlatform</span>. Made with <i class="icofont-heart-alt"></i> to empower learners worldwide.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
