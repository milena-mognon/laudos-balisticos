@extends('layout.component')
@section('page')
    <div class="col-lg-12">
        <div>
            <h3 class="float-left">{{ $model_name_plural }}: </h3>

        </div>
        <div class="table-responsive">
            <div class="row mb-3">

                <div class="col-lg-8">
                    <input class="form-control mt-3" type="text" placeholder="Pesquisar">

                </div>
                <div class="col-lg-4">
                    <a class="btn btn-block btn-success float-right mt-3" href="{{ route($route_create_name) }}">
                        <i class="fa fa-plus"></i> Cadastrar {{ $model_name_singular }}
                    </a>
                </div>
            </div>

            <table class="table table-bordered table-hover table-striped">
                <thead align="center">
                <tr>
                    @foreach ($ths as $th)
                        <th>{{ $th }}</th>
                    @endforeach
                    <th colspan="2">Ações</th>
                </tr>
                </thead>
                <tbody align="center">
                @yield('table-content')
                </tbody>
            </table>
        </div>
    </div>
    @include('shared.pagination_results', ['dados' => $dados])
@endsection