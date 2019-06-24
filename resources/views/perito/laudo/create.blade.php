@extends('new_layout.component')
@section('page')
    <div class="col-8">
        <h4>Informações Gerais do Laudo</h4>
    </div>
    <hr>
    {{ Form::open(['route' => 'laudos.store']) }}
    <div class="form-group row">
        @include('shared.label', ['for_label' => 'rep', 'label' => 'REP (00000/2019)'])
        @include('shared.input', ['name' => 'rep', 'size' => '3'])
    {{--</div>--}}
    {{--<div class="form-group row">--}}
        @include('shared.label', ['for_label' => 'data_designacao', 'label' => 'Data de Designação'])
        @include('shared.input_calendar', ['name' => 'data_designacao', 'size' => '3'])
    </div>

    <div class="form-group row">
        @include('shared.label', ['for_label' => 'data_solicitacao', 'label' => 'Data de Solicitação'])
        @include('shared.input_calendar', ['name' => 'data_solicitacao', 'size' => '3'])
    {{--</div>--}}

    {{--<div class="form-group row">--}}
        @include('shared.label', ['for_label' => 'oficio', 'label' => 'Ofício'])
        @include('shared.input', ['name' => 'oficio', 'size' => '3'])
    </div>

    <div class="form-group row">
        @include('shared.label', ['for_label' => 'indiciado', 'label' => 'Indiciado'])
        @include('shared.input', ['name' => 'indiciado', 'size' => '3'])
    {{--</div>--}}

    {{--<div class="form-group row">--}}
        @include('shared.label', ['for_label' => 'inquerito', 'label' => 'Inquerito Policial'])
        @include('shared.input', ['name' => 'inquerito', 'size' => '3'])
    </div>
    <div class="form-group row">
        @include('shared.label', ['for_label' => 'secao_id', 'label' => 'Seção'])
        @include('shared.select_with_id', ['name' => 'secao_id', 'dados' => $secoes, 'value' => "", 'user_secao' => true, 'size' => '3'])
    {{--</div>--}}

    {{--<div class="form-group row">--}}
        @include('shared.label', ['for_label' => 'cidade_id', 'label' => 'Cidade'])
        @include('shared.select_with_id', ['name' => 'cidade_id', 'dados' => $cidades, 'value' => "", 'size' => '3'])
    </div>

    <div class="form-group row">
        @include('shared.label', ['for_label' => 'solicitante_id', 'label' => 'Órgão Solicitanete'])
        @include('shared.select_with_array', ['name' => 'solicitante_id', 'dados' => [],
                 'value' => "", 'option_create' => true, 'size' => '3'])

        <input class="form-control" type="hidden" name="perito_id" autocomplete="off"
        value="{{ Auth::user()->id }}"/>

        @include('shared.label', ['for_label' => 'diretor_id', 'label' => 'Diretor'])
        @include('shared.select_with_id', ['name' => 'diretor_id', 'dados' => $diretores, 'size' => '3'])
    </div>
    <div class="col-lg-10 float-right">
        <a class="btn btn-secondary" href="{{ route('users.index') }}">Voltar</a>
        <button class="btn btn-success" type="submit">Cadastrar</button>
        {{ Form::close() }}
    </div>
@endsection
