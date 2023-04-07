<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head')
    <link rel="shortcut icon" href="{{ asset('image/logo2.png') }}" />
    <link rel="stylesheet" href="{{ asset('lib/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <script src="{{ asset('js/assets/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('lib/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset(mix('css/admin.css')) }}">
    <style>
        .tox-tinymce {
            height: 400px !important;
        }
        .ͼ1.cm-editor {
            min-height: 50px;
            max-height: 500px !important;
        }
    </style>
</head>

<body>
    <?php
    $user = \Illuminate\Support\Facades\Auth::user();
    ?>
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
    <script src="{{ asset('lib/assets/vendors/select2/select2.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>

</html>
