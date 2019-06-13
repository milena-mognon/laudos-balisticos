<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('jquery-ui-1.12.1.custom/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/layout.css')}}">
    {{--<link rel="stylesheet" href="{{ URL::asset('css/cropper.css')}}">--}}
    {{--<link rel="stylesheet" href="{{ URL::asset('css/sweetalert2.min.css')}}">--}}
    <link rel="stylesheet" href="{{ URL::asset('tinytoggle/css/tiny-toggle.css')}}">

    <link rel="stylesheet" href="{{ URL::asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
</head>
<body>
<div id="app" >
    @include('layout.menu')

    <main class="py-4">
        @yield('content')
    </main>
</div>
@include('layout.scripts')
</body>
</html>
