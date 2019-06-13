@extends('layout.card')
@section('size', "col-md-8")
@section('card-name','Cadastrar Usuários' )
@section('card-content')

    {!! Form::open(['route' => 'register']) !!}
    <div class="col-lg-12">

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('admin.shared.input',
                ['id' => 'nome', 'type' => 'text', 'name' => 'nome'])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'cargo_id', 'label' => 'Cargo'])
            @include('admin.shared.select',
                ['id' => 'cargo_id', 'name' => 'cargo_id', 'dados' => $cargos,
                'value' => ""])
        </div>

        <div class="form-group row">

            @include('admin.shared.label', ['for_label' => 'secao_id', 'label' => 'Seção'])
            @include('admin.shared.select',
                ['id' => 'secao_id', 'name' => 'secao_id', 'dados' => $secoes,
                'value' => ""])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'email', 'label' => 'Email'])

            @include('admin.shared.input',
            ['id' => 'email', 'type' => 'email', 'name' => 'email'])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'senha', 'label' => 'Senha'])
            @include('admin.shared.input',
            ['id' => 'senha', 'type' => 'password', 'name' => 'senha'])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'confirmacao_senha', 'label' => 'Confirmar Senha'])

            @include('admin.shared.input',
        ['id' => 'confirmacao_senha', 'type' => 'password', 'name' => 'confirmacao_senha'])
        </div>

        <div class="col-lg-10 float-right">
            <a class="btn btn-secondary" href="{{ route('users.index') }}">Voltar</a>

            <button class="btn btn-success" type="submit">Cadastrar</button>
            {{ Form::close() }}
        </div>
    </div>
@endsection
