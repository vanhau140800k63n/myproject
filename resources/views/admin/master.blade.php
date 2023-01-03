<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head')
    <link rel="stylesheet" href="{{ asset('css/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/assets/vendors/css/vendor.bundle.base.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('css/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo1.png') }}" />
</head>

<body>
    <div class="container-scroller">
        @include('admin.partials._sidebar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.partials._navbar')
            <div class="main-panel">
                @yield('content')
                @include('admin.partials._footer')
            </div>
        </div>
    </div>
    <script src="{{ asset('css/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('css/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('css/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('css/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('css/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('css/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('css/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('css/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('css/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('css/assets/js/misc.js') }}"></script>
    <script src="{{ asset('css/assets/js/settings.js') }}"></script>
    <script src="{{ asset('css/assets/js/todolist.js') }}"></script>
    <script src="{{ asset('css/assets/js/dashboard.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>

</html>
