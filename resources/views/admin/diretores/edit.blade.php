@extends('new_layout.component')
@section('page')

    <div class="col-8">
        <h4>Editar Diretor</h4>
    </div>
    <hr>
    {!! Form::open(['route' => ['diretores.update', $diretor], 'method' => 'patch']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('shared.input', ['name' => 'nome', 'value' => $diretor->nome])
        </div>

        <div class="form-group row">
            @include('shared.label', ['for_label' => 'inicio_direcao', 'label' => 'Inicio da Direção'])
            @include('shared.input_calendar', ['name' => 'inicio_direcao', 'value' => formatar_data_do_bd($diretor->inicio_direcao)])
        </div>

        <div class="form-group row">
            @include('shared.label', ['for_label' => 'fim_direcao', 'label' => 'Final da Direção'])
            @include('shared.input_calendar', ['name' => 'fim_direcao', 'value' => formatar_data_do_bd($diretor->fim_direcao)])
        </div>

        <div class="col-lg-10 float-right">
            <a class="btn btn-secondary" href="{{ route('diretores.index') }}">Voltar</a>
            <button class="btn btn-success " type="submit">Editar</button>
            {{ Form::close() }}
        </div>
    </div>
    </div>
@endsection
