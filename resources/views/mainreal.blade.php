<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/template/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/template/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/template/images/favicon.png') }}" />
</head>
<body>

    @yield('content')

<!-- plugins:js -->
<script src="{{ asset('/template/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('/template/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/template/vendors/progressbar.js/progressbar.min.js') }}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('/template/vs/off-canvas.js') }}"></script>
<script src="{{ asset('/template/vs/hoverable-collapse.js') }}"></script>
<script src="{{ asset('/template/vs/template.js') }}"></script>
<script src="{{ asset('/template/vs/settings.js') }}"></script>
<script src="{{ asset('/template/vs/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('/template/vs/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('/template/vs/dashboard.js') }}"></script>
<script src="{{ asset('/template/vs/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js for this page-->
</body>
</html>l
