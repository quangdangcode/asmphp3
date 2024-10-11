<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ asset('theme/admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('theme/admin/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('theme/admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="skin-blue">
    <div class="wrapper">
        <header class="main-header">
            @include('admin.layouts.header')
        </header>

        <aside class="main-sidebar">
            @include('admin.layouts.nav')
        </aside>

        @yield('content')

        <footer class="main-footer">
            @include('admin.layouts.footer')
        </footer>
        
    </div>

    <script src="{{ asset('theme/admin/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('theme/admin/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/admin/plugins/fastclick/fastclick.min.js') }}"></script>
    <script src="{{ asset('theme/admin/dist/js/app.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/admin/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/admin/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/admin/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/admin/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/admin/plugins/chartjs/Chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/admin/dist/js/pages/dashboard2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/admin/dist/js/demo.js') }}" type="text/javascript"></script>
</body>

</html>
