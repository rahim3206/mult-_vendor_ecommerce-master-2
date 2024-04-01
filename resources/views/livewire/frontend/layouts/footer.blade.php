        <!-- footer-area -->
        <footer>
            <div class="footer-area">
                <div class="footer-top pt-60 pb-40">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                                <div class="footer-widget mb-30">
                                    <div class="f-logo mb-25">
                                        <a href="{{ url('/') }}">
                                            @if(isset($settings->site_logo))
                                                <img src="{{ asset('settings/site/'.'/'.$settings->site_logo) }}" alt="{{ $settings->site_name }}">
                                            @else
                                                <span class="ms-1 font-weight-bold">{{ $settings->site_name }}</span>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="footer-content">
                                        <span>Got Question? Call us 24/7</span>
                                        <a href="tel:0123456" class="contact">{{ $settings->site_phone }}</a>
                                        <p>Register now to get updates on pronot get up ions & coupons ster now toon.</p>
                                    </div>
                                    <div class="footer-social">
                                        <ul>
                                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-4">
                                <div class="footer-widget mb-30">
                                    <div class="fw-title mb-20">
                                        <h2 class="title">INFORMATION</h2>
                                    </div>
                                    <div class="fw-link">
                                        <ul>
                                            <li><a href="contact.html">About Us</a></li>
                                            <li><a href="contact.html">Careers</a></li>
                                            <li><a href="contact.html">Orders & Shipping</a></li>
                                            <li><a href="contact.html">Office Supplies</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="contact.html">Customer Service</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
                                <div class="footer-widget mb-30">
                                    <div class="fw-title mb-20">
                                        <h2 class="title">MY ACCOUNT</h2>
                                    </div>
                                    <div class="fw-link">
                                        <ul>
                                            <li><a href="shop.html">Track My Order</a></li>
                                            <li><a href="shop.html">View Cart</a></li>
                                            <li><a href="contact.html">Sign In</a></li>
                                            <li><a href="contact.html">Help</a></li>
                                            <li><a href="shop.html">My Wishlist</a></li>
                                            <li><a href="contact.html">Privacy Policy</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                <div class="footer-widget mb-30">
                                    <div class="fw-title mb-20">
                                        <h2 class="title">CUSTOMER SERVICE</h2>
                                    </div>
                                    <div class="fw-link">
                                        <ul>
                                            <li><a href="vendor-setting.html">Payment Methods</a></li>
                                            <li><a href="contact.html">Money-back guarantee!</a></li>
                                            <li><a href="contact.html">Products Returns</a></li>
                                            <li><a href="contact.html">Support Center</a></li>
                                            <li><a href="vendor-list.html">Shipping</a></li>
                                            <li><a href="contact.html">Term and Conditions</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-7">
                                <div class="copyright-text">
                                    <p>Copyright ©2024 {{  $settings->site_name }} All Rights Reserved</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5">
                                <div class="cart-img text-end">
                                    <img src="{{ asset('frontend_assets/img/images/cart_img.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area-end -->
