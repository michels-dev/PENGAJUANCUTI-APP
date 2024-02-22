<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>@yield('title') -BPK PENABUR</title>

    @stack('before-styles')
    <link rel="icon" href="{{ asset('image/icondark.png') }}" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href=".{{ asset('adminlte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminlte3/dist/css/adminlte.min.css?v=3.2.0') }}/">

    @stack('after-styles')
</head>

<body class="hold-transition login-page">
{{-- Fitur --}}
    @yield('content')
{{-- End Fitur --}}

@stack('before-scripts')
<script src="{{ asset('adminlte3/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('adminlte3/dist/js/adminlte.min.js?v=3.2.0') }}"></script>

@stack('after-scripts')

</body>
</html>