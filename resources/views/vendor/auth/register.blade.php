@extends('frontend.layouts.app')
@section('title', 'Become a Vendor')
@section('content')
 <!-- main-area -->
 <main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area-four breadcrumb-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="breadcrumb-content">
                        <h2 class="title">become a Vendor</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">become a vendor</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="breadcrumb-img text-end">
                        <img src="{{ asset('frontend_assets/img/images/breadcrumb_img.png') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- vendor-registration-area -->
    <section class="vendor-registration-area pt-90 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="vr-form-box">
                        <h3 class="title">Vendor Registration Form</h3>
                        <form action="{{ route('vendor.register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <label for="name">First Name *</label>
                                        <input type="text" id="name" class="@error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus>
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <label for="name">Last Name *</label>
                                        <input type="text" id="name" class="@error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus>
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-grp">
                                <label for="email">Email address *</label>
                                <input type="email" id="email"  class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <label for="password">Password *</label>
                                        <input type="password" id="password"  class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <label for="re-password">Re-Password *</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-grp checkbox-grp m-0">
                                <input type="checkbox" id="checkbox">
                                <label for="checkbox">Your personal data will be used to support your experience throughout this website</label>
                            </div>
                            <a href="{{ route('vendor.login.get') }}" wire:navigate>already have an account?</a><br><br>
                            <button type="submit">REGISTER</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- vendor-registration-area-end -->

    <!-- newsletter-area -->
    <section class="newsletter-area-two">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-7 col-lg-6 col-md-12">
                    <div class="newsletter-content">
                        <i class="fa-regular fa-paper-plane"></i>
                        <h2 class="title">Sign Up for get 10% Weekly <span>Newsletter</span></h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-10">
                    <div class="newsletter-form">
                        <input type="text" placeholder="Your email here...">
                        <button type="submit">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- newsletter-area-end -->
</main>
<!-- main-area-end -->
@endsection
