<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('backend.layouts.partials._styles')
    @yield('style')

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        @include('backend.layouts.partials._sidebar')
        <!-- main content area start -->
        <div class="main-content">
            @include('backend.layouts.partials._header')
           @yield('content')
        </div>
        <!-- main content area end -->
        @include('backend.layouts.partials._footer')
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    @include('backend.layouts.partials._offsets')
    @include('backend.layouts.partials._scripts')
    @yield('script')
</body>

</html>