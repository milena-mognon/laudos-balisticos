<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">

<section id="home">
    <div class="home-container">
        <div class="wow fadeIn">
            <div class="home-logo">
                <img src="../image/logo-sem-fundo.png" alt="Logo da Policia Científica do Paraná">
            </div>

            <h1>Gerador de Laudos Balísticos</h1>
            <div class="actions">
                @auth
                    <a class="btn-get-started" href="{{ route('dashboard') }}">Home</a>
                @else
                    <a class="btn-get-started" href="{{ route('login') }}">Login</a>
                @endauth
                <a href="#" class="btn-solicita">Solicitar Acesso</a>

            </div>
            <br>
            <h5 style="color: white;"><strong>Sistema em desenvolvimento! Para ter acesso, envie um email para
                    milenamognon@gmail.com
                </strong></h5>

            <h5 style="color: white;"><strong>Melhor Visualizado no navegador Google Chrome</strong></h5>
        </div>
    </div>
</section>
