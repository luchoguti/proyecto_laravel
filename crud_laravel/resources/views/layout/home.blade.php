<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
		<link rel="stylesheet" type="text/css" href="{{asset('css/grid.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/camera.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/owl-carousel.css')}}">

    	<script type="{{asset('js/jquery.js')}}"></script>
    	<script type="{{asset('js/jquery-migrate-1.2.1.js')}}"></script>

    </head>
    <body>
        @yield('content')
    </body>
</html>
