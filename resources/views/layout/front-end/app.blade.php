<!doctype html>
<html class="no-js" lang="eng">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Mediseva</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" type="image/x-icon" href="img/logo.png">


	<link rel="stylesheet" href="{{asset('assets/front-end/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front-end/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front-end/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front-end/css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front-end/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front-end/css/flaticon.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front-end/css/slicknav.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front-end/css/style.css')}}">

</head>
<body>

<!-- Begin Header Area -->



<!-- Begin Banner AreA -->
@stack('css')

@include('layout.front-end.partials.header')
<!-- Banner Area -->
@yield('content')

@include('layout.front-end.partials.footer');




<script src="{{asset('assets/front-end/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{asset('assets/front-end/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('assets/front-end/js/popper.min.js')}}"></script>
<script src="{{asset('assets/front-end/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front-end/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/front-end/js/nice-select.min.js')}}"></script>
<script src="{{asset('assets/front-end/js/jquery.slicknav.min.js')}}"></script>
<script src="{{asset('assets/front-end/js/main.js')}}"></script>
@stack('script')

</body>
</html>