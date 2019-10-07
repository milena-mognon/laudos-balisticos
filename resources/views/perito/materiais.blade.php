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
                'value' => 'Espingarda Artesanal', 'route' => 'espingardas_artesanais.create'])
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
            <div class="col-lg-3 mt-3">
                @include('shared.block_button', ['col_name' => 'tipo_municao',
                'value' => 'Cartucho Arma Curta ', 'route' => 'armas_curtas.create'])
            </div>
            <div class="col-lg-3 mt-3">
                @include('shared.block_button', ['col_name' => 'tipo_municao',
                'value' => 'Cartucho Arma Longa', 'route' => 'armas_longas.create'])
            </div>
        </div>
    </div>
    <h5>Componentes</h5>
    <div class="col-12">
        <div class="row border mb-3 mt-3">
            <div class="col-lg-3 mt-3">
                @include('shared.block_button', ['col_name' => 'componente',
                'value' => 'Balins de Chumbo ', 'route' => 'balins_chumbo.create'])
            </div>
            <div class="col-lg-3 mt-3">
                @include('shared.block_button', ['col_name' => 'componente',
                'value' => 'Espoletas ', 'route' => 'espoletas.create'])
            </div>
            <div class="col-lg-3 mt-3">
                @include('shared.block_button', ['col_name' => 'componente',
                'value' => 'Pólvora ', 'route' => 'polvora.create'])
            </div>
        </div>
    </div>
    <h5>Objetos</h5>
    <div class="col-12">
        <div class="row border mb-3 mt-3">
            <div class="col-lg-3 mt-3">

            </div>
        </div>
    </div>
    <div class="col-lg-3 mt-2">
        <a class="btn btn-secondary btn-block" href="{{ route('laudos.show', $laudo) }}">
            <i class="fas fa-arrow-circle-left"></i> Voltar ao Laudo</a>
    </div>
@endsection