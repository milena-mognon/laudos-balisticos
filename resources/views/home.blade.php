<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">
</head>

<body>
    <section id="home">
        <div class="home-container">
            <div class="home-logo">
                <img src="../image/logo-sem-fundo.png" alt="Logo da Policia Científica do Paraná">
            </div>

            <h1>GLB - Gerador de Laudos Balísticos</h1>
            <div class="actions">
                @auth
                <a class="btn-home-page" href="{{ route('dashboard') }}">
                    Home
                </a>
                @else
                <a class="btn-home-page" href="{{ route('login') }}">
                    Login
                </a>
                @endauth
                {{-- <a href="#" class="btn-solicita">Solicitar Acesso</a> --}}
            </div>
            <br>
            <h5 class="text-white">
                {{-- <strong>Sistema em desenvolvimento! Para ter acesso, envie um email para
                        milenamognon@gmail.com
                    </strong> --}}
            </h5>
            <h6 class="text-white">
                <strong>Melhor Visualizado no navegador Google Chrome</strong>
            </h6>
        </div>
    </section>
    <footer>

    </footer>
</body>

</html>