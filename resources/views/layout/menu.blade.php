<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="{{ route('home') }}">Laudos Balísticos</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fa fa-bars"></i>
    </button>
</nav>

<div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fa fa-fw fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('laudos.create') }}">
                <i class="fa fa-fw fa-file"></i>
                <span>Novo Laudo</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('laudos.index') }}">
                <i class="fa fa-fw fa-folder-open"></i>
                <span>Meus Laudos</span></a>
        </li>
        <li class="nav-item admin_reports">
            <a class="nav-link" href="{{ route('relatorios.index') }}">
                <i class="fa fa-fw fa-chart-bar"></i>
                <span>Relatórios</span></a>
        </li>
        {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="{{ route('perito.relatorios.index') }}">--}}
        {{--<i class="fa fa-fw fa-chart-bar"></i>--}}
        {{--<span>Relatórios</span></a>--}}
        {{--</li>--}}

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-sign-out-alt"></i>
                <span>{{ __('Logout') }}</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>