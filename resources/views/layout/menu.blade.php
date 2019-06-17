<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                {{--<!-- Authentication Links -->--}}
                {{--@guest--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                    {{--</li>--}}
                {{--@else--}}
                    {{--@if (Auth::user()->cargo_id==3)--}}
                        {{--<a class="nav-link text-white" href="{{ route('user.index') }}">Usuários</a>--}}

                    {{--@endif--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link text-white" href="{{ route('pesquisa.index') }}">Meus Laudos</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link text-white" href="{{ route('origens.index') }}">Países</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link text-white" href="{{ route('solicitantes.index') }}">Órgãos Solicitantes</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link text-white" href="{{ route('diretores.index') }}">Diretores</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link text-white" href="{{ route('users.index') }}">Usuários</a>--}}
                    {{--</li>--}}
            {{--<li class="nav-item">--}}
                        {{--<a class="nav-link text-white" href="{{ route('pesquisa.create') }}">Pesquisar</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link text-white" href="{{ route('laudo.create') }}">Criar Laudo</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link text-white" href="#">Relatório</a>--}}
                    {{--</li>--}}
                    <li class="nav-item dropdown">
                        {{--<a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"--}}
                           {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                            {{--{{ Auth::user()->nome }} <span class="caret"></span>--}}
                        {{--</a>--}}
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Controle<span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            {{--@if (Auth::user()->cargo_id==3)--}}
                                {{--<a class="dropdown-item" href="{{ route('register') }}">--}}
                                    {{--{{ __('Registrar Usuário') }}--}}
                                {{--</a>--}}
                                {{--<a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id) }}">--}}
                                    {{--{{ __('Editar Perfil') }}--}}
                                {{--</a>--}}
                            {{--@endif--}}
                            <a class="dropdown-item" href="{{ route('origens.index') }}">Países
                            </a>
                            <a class="dropdown-item" href="{{ route('solicitantes.index') }}">Órgãos Solicitantes
                            </a>
                            <a class="dropdown-item" href="{{ route('users.index') }}">Usuários
                            </a>
                            <a class="dropdown-item" href="{{ route('diretores.index') }}">Diretores
                            </a>
                            <a class="dropdown-item" href="{{ route('marcas.index') }}">Marcas
                            </a>
                            <a class="dropdown-item" href="{{ route('calibres.index') }}">Calibres
                            </a>
                        </div>

                            {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                               {{--onclick="event.preventDefault();--}}
                                             {{--document.getElementById('logout-form').submit();">--}}
                                {{--{{ __('Logout') }}--}}
                            {{--</a>--}}

                            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                {{--{{ csrf_field() }}--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                {{--@endguest--}}
            </ul>
        </div>
    </div>
</nav>
