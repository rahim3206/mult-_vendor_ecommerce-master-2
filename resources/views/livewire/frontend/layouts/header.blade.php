<!-- header-area -->
<header>
    <div class="header-top-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="header-top-left">
                        <a href="#">Welcome! Free Shipping on orders over US$29.99</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-top-right">
                        <ul>
                            <li><a href="{{ route('vendor.register.get') }}" wire:navigate>Become a Vendor</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-search-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3">
                    <div class="logo">
                        <a href="{{ url('/') }}" wire:navigate>
                            @if(isset($settings->site_logo))
                                <img src="{{ asset('settings/site/'.'/'.$settings->site_logo) }}" alt="{{ $settings->site_name }}">
                            @else
                                <span class="ms-1 font-weight-bold">{{ $settings->site_name }}</span>
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9">
                    <div class="d-block d-sm-flex align-items-center justify-content-end">
                        <div class="header-search-wrap">
                            <form action="#">
                                <input type="text" placeholder="Search for product...">
                                <select class="custom-select">
                                    <option selected="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                <button><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="header-action">
                            <ul>
                                <li><a href="#"><i class="far fa-star"></i>Wishlist</a></li>
                                <li><a href="#"><i class="fas fa-redo"></i>Compare</a></li>
                                <li class="header-shop"><a href="#"><i class="flaticon-shopping-bag"></i>Cart
                                <span class="cart-count">0</span>
                                </a></li>
                                <li class="header-sine-in">
                                    <a href="{{ auth()->check() ? '' : route('login') }}" wire:navigate>
                                        <i class="flaticon-user"></i>
                                        <p>Hello, {{ auth()->user()->name ?? "Sign in" }} : <span>My Account</span></p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="menu-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu-wrap">
                        <nav class="menu-nav">
                            <div class="logo d-none">
                                <a href="{{ url('/') }}" wire:navigate>
                                    @if(isset($settings->site_logo))
                                        <img src="{{ asset('settings/site/'.'/'.$settings->site_logo) }}" alt="{{ $settings->site_name }}">
                                    @else
                                        <span class="ms-1 font-weight-bold">{{ $settings->site_name }}</span>
                                    @endif
                                </a>
                            </div>
                            <div class="header-category">
                                <a href="#" class="cat-toggle">
                                    <i class="fas fa-bars"></i>
                                    Browse Categories
                                    <i class="fas fa-angle-down"></i>
                                </a>
                                <ul class="category-menu">
                                    @foreach ($categories as $category)
                                    <li class="menu-item-has-children"><a href="#"><i class="{{ $category->icon }}"></i>{{ $category->title }}</a>
                                        <ul class="megamenu">
                                            <li class="sub-column-item"><a href="#">All Categories</a>
                                                <ul>
                                                    @foreach ($category->sub_categories as $sub_category)
                                                        <li><a href="#">{{ $sub_category->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}"  wire:navigate>Home</a></li>
                                    <li class="menu-item-has-children"><a href="#">SHOP</a>
                                        <ul class="submenu">
                                            <li><a href="#">Our Shop</a></li>
                                            <li><a href="shop-details.html">shop Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="promotion.html">PROMOTION</a></li>
                                    <li class="menu-item-has-children"><a href="#">BLOG</a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Our blog</a></li>
                                            <li><a href="blog-details.html">blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="index-3.html">SPECIAL</a></li>
                                    <li class="menu-item-has-children"><a href="#">PAGES</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('vendor.register.get') }}" wire:navigate>become a vendor</a></li>
                                            <li><a href="vendor-profile.html">vendor Profile</a></li>
                                            <li><a href="vendor-setting.html">vendor setting</a></li>
                                            <li><a href="coupon.html">coupon list</a></li>
                                            <li><a href="contact.html">contact</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="vendor-list.html">vendor Store List</a></li>
                                </ul>
                            </div>
                            <div class="header-action d-none d-md-block">
                                <ul>
                                    <li class="header-btn"><a href="#">Super Discount <img src="{{ asset('frontend_assets/img/images/discount_shape.png') }}" alt=""></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <nav class="menu-box">
                            <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
                            <div class="nav-logo">
                                <a href="{{ url('/') }}" wire:navigate>
                                    @if(isset($settings->site_logo))
                                        <img src="{{ asset('settings/site/'.'/'.$settings->site_logo) }}" alt="{{ $settings->site_name }}">
                                    @else
                                        <span class="ms-1 font-weight-bold">{{ $settings->site_name }}</span>
                                    @endif
                                </a>
                            </div>
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu-backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->




