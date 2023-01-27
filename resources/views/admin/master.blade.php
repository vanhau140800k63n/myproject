<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head')
    <link rel="stylesheet" href="{{ asset('lib/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/assets/vendors/css/vendor.bundle.base.css') }}">
    <script src="{{ asset('js/assets/jquery.min.js') }}"></script>
    {{-- <link rel="stylesheet" href="{{ asset('lib/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('lib/assets/css/style.css') }}">
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
    <script src="{{ asset('lib/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('lib/assets/js/misc.js') }}"></script>
    <script src="{{ asset('lib/assets/js/dashboard.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>

</html>
