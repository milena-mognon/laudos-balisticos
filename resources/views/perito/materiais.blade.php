@extends('layout.component')
@section('page')
    <div class="col-12">
        <h4>Selecione o Material</h4>
    </div>
    <hr>
    <h5>Armas de fogo</h5>
    <input type="hidden" name="laudo_id" value="{{$laudo}}">
    <div class="col-12">
        <div class="row border mb-3">
            <div class="col-lg-3 mt-3">
                @include('shared.block_button', ['col_name' => 'tipo_arma',
                'value' => 'Garrucha', 'route' => 'garruchas.create'])
            </div>
            <div class="col-lg-3 mt-3">
                @include('shared.block_button', ['col_name' => 'tipo_arma',
                'value' => 'Espingarda', 'route' => 'espingardas.create'])
            </div>
            <div class="col-lg-3 mt-3">
                @include('shared.block_button', ['col_name' => 'tipo_arma',
                'value' => 'Pistola', 'route' => 'pistolas.create'])
            </div>
            <div class="col-lg-3 mt-3">
                @include('shared.block_button', ['col_name' => 'tipo_arma',
                'value' => 'Revólver', 'route' => 'revolveres.create'])
            </div>
        </div>
    </div>
    <h5>Munição, Estojo e/ou Projétil</h5>
    <div class="col-12">
        <div class="row border mb-3 mt-3">
            <div class="col-lg-4 mt-3">

            </div>
        </div>
    </div>
    <h5>Acessórios e Componentes</h5>
    <div class="col-12">
        <div class="row border mb-3 mt-3">
            <div class="col-lg-4 mt-3">

            </div>
        </div>
    </div>
    {{--<button type="button" class="btn btn-secondary btn-lg btn-block">Garrucha</button>--}}
    {{--<button type="button" class="btn btn-secondary btn-lg btn-block">Pistola</button>--}}
    {{--<button type="button" class="btn btn-secondary btn-lg btn-block">Espingarda</button>--}}
    {{--</div>--}}
    {{--<hr>--}}
    {{--<h5>Munições, Estojos e Projéteis</h5>--}}
    {{--<div class="col-lg-4">--}}
    {{--<button type="button" class="btn btn-secondary btn-lg btn-block">Munição Arma Curta</button>--}}
    {{--<button type="button" class="btn btn-secondary btn-lg btn-block">Munição Arma Longa</button>--}}
    {{--</div>--}}
    {{--<hr>--}}
    {{--<h5>Componentes</h5>--}}
    {{--<div class="col-lg-4">--}}
    {{--<button type="button" class="btn btn-secondary btn-lg btn-block">Balins de Chumbo</button>--}}
    {{--<button type="button" class="btn btn-secondary btn-lg btn-block">Espoletas</button>--}}
    {{--<button type="button" class="btn btn-secondary btn-lg btn-block">Pólvora</button>--}}
    {{--</div>--}}
    {{--<hr>--}}
    {{--<h5>Arma Branca</h5>--}}
    {{--<div class="col-lg-4">--}}
    {{--<button type="button" class="btn btn-secondary btn-lg btn-block">Faca</button>--}}
    {{--</div>--}}
    <div class="col-lg-3 mt-2">
        <a class="btn btn-secondary btn-block" href="{{ route('laudos.show', $laudo) }}">
            <i class="fas fa-arrow-circle-left"></i> Voltar ao Laudo</a>
    </div>
@endsection