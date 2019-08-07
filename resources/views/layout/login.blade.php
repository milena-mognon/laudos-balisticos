<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>
        {{--<!-- Styles -->--}}
        <link rel="stylesheet" href="{{ URL::asset('css/sb-admin.css')}}">
    </head>
    <body class="bg-dark">
        <div id="content-wrapper">
            <div class="container-fluid">
                @yield('content')
                <div class="copyright text-center text-white">
                    <span>Copyright © Milena Mognon 2019</span>
                </div>
            </div>
        </div>
    </body>
</html>
