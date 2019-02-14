<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SP Portal Website</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('framework/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('framework/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('framework/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('framework/fontawesome/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">

    <!---Custom CSS apply this website--->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/style.css')}}">
</head>
<body>

@include('sp_registration.inc.navbar')

@yield('content')

@include('sp_registration.inc.footer')


<script src="{{asset('framework/jquery/jquery.min.js')}}"></script>
<script src="{{asset('framework/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{asset('framework/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('custom/script.js')}}"></script>
<!-- Bootstrap core JS -->
<script src="{{asset('framework/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMfl6pAmNv3T6PoDRy7ESSJRZLLSFf2jI&libraries=places"></script>
</body>
</html>