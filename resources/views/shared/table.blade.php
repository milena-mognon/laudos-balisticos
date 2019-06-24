@extends('new_layout.component')
{{--@section('card-name', $card_name )--}}
@section('page')
    <div class="col-lg-12">
        <div>
            <h3 class="float-left">{{ $model_name_plural }}: </h3>
            <a class="btn btn-success float-right" href="{{ route($route_create_name) }}">
                <i class="fa fa-plus"></i> Cadastrar {{ $model_name_singular }}</a>
        </div>
        <div class="table-responsive">
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
@endsection