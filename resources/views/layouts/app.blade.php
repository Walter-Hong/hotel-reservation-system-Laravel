<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <!-- ========== SEO ========== -->
    <title>@yield('title') | {{ $setting->company }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <!-- Styles -->
{{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

<!-- ========== STYLESHEETS ========== -->
    <link href="{{ asset('app/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('app/revolution/css/layers.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('app/revolution/css/settings.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('app/revolution/css/navigation.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('app/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('app/css/animate.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('app/css/famfamfam-flags.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('app/css/magnific-popup.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('app/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('app/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('app/css/responsive.css') }}" rel="stylesheet" type="text/css">

    <!-- ========== ICON FONTS ========== -->
    <link href="{{ asset('app/fonts/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('app/fonts/flaticon.css') }}" rel="stylesheet">

    @yield('style')
</head>
<body>

<!-- ========== PRELOADER ========== -->
<div id="loading">
    <div class="inner">
        <div class="loading_effect">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
        </div>
    </div>
</div>

<div class="wrapper">

@include('layouts.partial.nav')

@yield('content')

<!-- ========== BACK TO TOP ========== -->
    <div id="back_to_top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>

    <!-- ========== NOTIFICATION ========== -->
    <div id="notification">
        @include('flashy::message')
    </div>

    {{--@include('layouts.partial.footer')--}}

</div>

<!-- ========== JAVASCRIPT ========== -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('app/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('app/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('app/js/jquery.smoothState.js') }}"></script>
<script src="{{ asset('app/js/moment.min.js') }}"></script>
<script src="{{ asset('app/js/morphext.min.js') }}"></script>
<script src="{{ asset('app/js/wow.min.js') }}"></script>
<script src="{{ asset('app/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('app/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('app/js/owl.carousel.thumbs.min.js') }}"></script>
<script src="{{ asset('app/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('app/js/jPushMenu.js') }}"></script>
<script src="{{ asset('app/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('app/js/countUp.min.js') }}"></script>
<script src="{{ asset('app/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('app/js/main.js') }}"></script>


@yield('script')
</body>
</html>
