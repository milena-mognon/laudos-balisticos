@extends('new_layout.component')
@section('page')
    <div class="col-8">
        <h4>Cadastro de Revólver</h4>
    </div>
    <hr>
    {{ Form::open(['route' => 'revolveres.store']) }}
    <input type="hidden" name="laudo_id" id="laudo_id" value="{{ $laudo_id }}">
    <input type="hidden" name="tipo_arma" id="tipo_arma" value="Revólver">

    <div class="col-lg-12" style="padding: 0 5% 0">
        <div class="row mb-3">
            <div class="col-lg-3">
                @include('perito.attributes.marca', ['acao' => 'cadastrar', 'tipo' => 'Arma'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.modelo', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.origem', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.calibre', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.serie', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.tambor', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.capacidade_tambor', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.percutor', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.tipo_acabamento', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.cabo', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.estado_geral', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.comprimento', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.altura', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.comprimento_cano', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.quantidade_raias', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.sentido_raias', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.funcionamento', ['acao' => 'cadastrar'])
            </div>
            <div class="col-lg-3">
                @include('perito.attributes.lacre', ['acao' => 'cadastrar'])
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <button type="submit" class="btn btn-outline-success btn-block"><strong>Incluir Peça</strong></button>
                {{ Form::close() }}
            </div>
            <input type="hidden" name="img" id="ref_imagem">
            <div class="col-lg-4">
                <button class="btn btn-outline-primary btn-block"  type="button" id="addImagem"><strong>Adicionar Imagem</strong></button>
            </div>
            <div class="col-lg-4" id="div-button-imagem">
                <button class="btn btn-outline-primary btn-block" type="button" id="visualizarImagem"><strong>Visualizar Imagem</strong></button>
            </div>
        </div>
    </div>

    @include('perito.modals.all_modals')
@endsection
