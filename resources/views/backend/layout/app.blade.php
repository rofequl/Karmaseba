<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin Panel | Karmaseba</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('framework/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('framework/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <!-- Font Awesome Icons -->
    <link href="{{asset('framework/fontawesome/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('framework/adminLTE/js/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('framework/adminLTE/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="{{asset('custom/backend/style.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('backend.inc.navbar')

    @include('backend.inc.sidebar')

    @yield('content')

</div>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('framework/jquery/jquery.min.js')}}"></script>
<script src="{{asset('framework/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{asset('framework/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('framework/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('framework/adminLTE/js/adminlte.min.js')}}"></script>
<script src="{{asset('framework/adminLTE/js/pages/dashboard2.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="{{asset('framework/adminLTE/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('framework/adminLTE/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('framework/adminLTE/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('framework/adminLTE/js/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('framework/adminLTE/js/plugins/chartjs-old/Chart.min.js')}}"></script>
<script src="{{asset('custom/backend/script.js')}}"></script>
</body>
</html>