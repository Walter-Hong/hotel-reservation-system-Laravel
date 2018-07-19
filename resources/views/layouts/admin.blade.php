<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">

    <meta>
    <!-- ADD PAGE SPECIFIC META -->
    @yield('meta')

    </meta>

    <!-- ========== SEO ========== -->
    <title>@yield('title') | {{ $setting->company }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('style')
</head>
<body id="app-layout">
@include('layouts.partial.nav-admin')

@yield('content')

<!-- JavaScripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@include('flashy::message')

@yield('script')
</body>
</html>
