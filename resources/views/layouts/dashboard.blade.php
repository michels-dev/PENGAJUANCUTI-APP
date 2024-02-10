<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>@yield('title') | Pengajuan Cuti</title>

@stack('before-styles')
<link rel="icon" href="{{ asset('image/gambar/logopicf.png') }}" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="{{ asset('template/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<!-- Bootstrap Select Css -->
<link href="{{ asset('template/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
<!-- Custom Css -->
<link  rel="stylesheet" href="{{ asset('template/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/css/blog.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/css/color_skins.css') }}">
<!-- Sweet Alert -->
<link rel="stylesheet" href="{{ asset('../template/assets/plugin/sweet-alert/sweetalert.css') }}">
@stack('after-styles')

</head>
<body class="theme-blush" style="background-color: #fcfcfc">

{{-- Fitur --}}
    @yield('content')
{{-- End Fitur --}}

@stack('before-scripts')
<!-- Jquery Core Js -->
<script src="{{ asset('template/assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('template/assets/bundles/vendorscripts.bundle.js') }}"></script>
<script src="{{ asset('template/assets/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>
<script src="{{ asset('template/assets/js/pages/ui/dialogs.js') }}"></script>
<script src="{{ asset('template/assets/js/pages/charts/sparkline.js') }}"></script>
<script src="{{ asset('template/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('template/assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('template/assets/js/pages/tables/jquery-datatable.js') }}"></script>
{{-- Script Sweet Alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- datatables --}}
<script>
    $(function () {
    $('.js-basic-example').DataTable();
    });
</script>
@stack('after-scripts')

</body>
</html>
