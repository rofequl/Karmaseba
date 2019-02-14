<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('framework/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('framework/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    <!-- Owlcarousel core CSS -->
    <link href="{{asset('framework/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('framework/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link href="{{asset('framework/fontawesome/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="{{asset('framework/adminLTE/js/plugins/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('framework/adminLTE/js/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('framework/adminLTE/css/adminlte.min.css')}}">
    <!---Custom CSS apply this website--->

    <link rel="stylesheet" type="text/css" href="{{asset('custom/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/css/service.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/mainIndex.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/frontend/service.css')}}">
</head>
<body class="mainIndex">

@include('frontend.inc.header')

@yield('content')

@include('frontend.inc.footer')


<!-- JavaScript Libraries -->
<script src="{{asset('framework/jquery/jquery.min.js')}}"></script>
<script src="{{asset('framework/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{asset('framework/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('framework/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('custom/script.js')}}"></script>
<!-- Bootstrap core JS -->
<script src="{{asset('framework/adminLTE/js/adminlte.min.js')}}"></script>
<script src="{{asset('framework/adminLTE/js/pages/dashboard.js')}}"></script>
<script src="{{asset('framework/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('framework/adminLTE/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('framework/adminLTE/js/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!---Custom Javascript apply this website--->
<script>
    $('.recommend-carousel').owlCarousel({
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        loop: true,
        margin: 20,
        dots: true,
        nav: false,
        responsiveClass: true,
        responsive: {0: {items: 1}, 768: {items: 2}, 900: {items: 3}}
    });
</script>
</body>
</html>