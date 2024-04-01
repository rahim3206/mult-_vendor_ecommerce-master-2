<!doctype html>
<html class="no-js" lang="">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title') | {{ $settings->site_name }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('settings/site'.'/'.$settings->site_favicon) }}">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend_assets/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend_assets/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend_assets/css/mCustomScrollbar.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend_assets/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend_assets/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend_assets/css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend_assets/css/default.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend_assets/css/responsive.css') }}">
        @livewireStyles
    </head>
    <body>

        <!-- Preloader -->
        {{-- <div id="preloader">
            <div id="preloader-status">
                <div class="preloader-position loader"> <span></span> </div>
            </div>
        </div> --}}
        <!-- Preloader end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <livewire:frontend.layouts.header />
        @yield('content')
        <livewire:frontend.layouts.footer />


  <!-- JS here -->
  <script src="{{ asset('frontend_assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/jquery.mCustomScrollbar.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/slick.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/wow.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/main.js') }}"></script>
  @livewireScripts
</body>

</html>
