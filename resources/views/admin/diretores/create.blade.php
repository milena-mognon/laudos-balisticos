@extends('new_layout.component')
@section('page')
    <div class="col-8">
        <h4>Cadastrar Diretor</h4>
    </div>
    <hr>
    {!! Form::open(['route' => 'diretores.store']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('shared.input', ['name' => 'nome'])
        </div>

        <div class="form-group row">
            @include('shared.label', ['for_label' => 'inicio_direcao', 'label' => 'Inicio da Direção'])
            @include('shared.input_calendar', ['name' => 'inicio_direcao'])
        </div>

        <div class="form-group row">
            @include('shared.label', ['for_label' => 'fim_direcao', 'label' => 'Final da Direção'])
            @include('shared.input_calendar', ['name' => 'fim_direcao'])
        </div>

        <div class="col-lg-10 float-right">
            <a class="btn btn-secondary" href="{{ route('diretores.index') }}">Voltar</a>
            <button class="btn btn-success" type="submit">Cadastrar</button>
            {{ Form::close() }}
        </div>
    </div>
@endsection
