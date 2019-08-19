@extends('layout.component')
@section('js')
    {!! Html::script('js/cadastrar_opcao.js') !!}
@endsection
@section('page')
    <div class="col-8">
        <h4>Cadastrar Informações Gerais do Laudo</h4>
    </div>
    <hr>
    {{ Form::open(['route' => 'laudos.store']) }}

    <div class="row m-auto">
        @include('perito.laudo.attributes.rep', ['rep' =>  $laudo->rep ?? old('rep')])
        @include('perito.laudo.attributes.oficio', ['oficio' =>  $laudo->oficio ?? old('oficio')])
        @include('perito.laudo.attributes.indiciado', ['indiciado' =>  $laudo->indiciado ?? old('indiciado')])
        @include('perito.laudo.attributes.inquerito', ['inquerito' =>  $laudo->inquerito ?? old('inquerito')])

        @include('shared.input_calendar', ['label' => 'Data da Solicitação', 'name' => 'data_solicitacao', 'size' => '3', 'value' => ''])
        @include('shared.input_calendar', ['label' => 'Data da Designação','name' => 'data_designacao', 'size' => '3', 'value' => ''])
        <input class="form-control" type="hidden" name="perito_id" autocomplete="off"
               value="{{ Auth::id() }}"/>
        @include('perito.laudo.attributes.secao', ['secao2' =>  $laudo->secao_id ?? old('secao_id')])
        @include('shared.attributes.cidades', ['id' => 'cidade_id', 'size' => '4', 'cidade2' =>  $laudo->cidade_id ?? old('cidade_id')])
        @include('perito.laudo.attributes.solicitante', ['solicitante2' =>  $laudo->solicitante_id ?? old('solicitante_id')])
        @include('perito.laudo.attributes.diretor', ['diretor2' =>  $laudo->diretor_id ?? old('diretor_id')])

    </div>
    <div class="row m-auto justify-content-between">
        <div class="col-lg-4 mt-5 mb-4">
            <a class="btn btn-secondary btn-block" href="{{ route('laudos.index') }}">
                <i class="fas fa-arrow-circle-left"></i> Voltar</a>
        </div>
        <div class="col-lg-4 mt-5 mb-4">
            <button class="btn btn-success btn-block" type="submit">
                <i class="fas fa-save"></i> Salvar e Continuar
            </button>
        </div>
    </div>
    {{ Form::close() }}
    @include('perito.modals.solicitante_modal')

@endsection
