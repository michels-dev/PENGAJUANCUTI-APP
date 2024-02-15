<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>@yield('title') -BPK PENABUR</title>

    @stack('before-styles')
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('image/logopenabur.png') }}" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('template/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/authentication.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/color_skins.css') }}">

    @stack('after-styles')
</head>

<body class="theme-orange">
{{-- Fitur --}}
    @yield('content')
{{-- End Fitur --}}

@stack('before-scripts')
<!-- Jquery Core Js -->
<script src="{{ asset('template/assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('template/assets/bundles/vendorscripts.bundle.js') }}"></script>
<script src="{{ asset('template/assets/bundles/mainscripts.bundle.js') }}"></script>

@stack('after-scripts')

</body>
</html>