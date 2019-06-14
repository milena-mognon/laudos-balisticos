@extends('layout.card')
@section('size', "col-md-8")
@section('card-name', 'Editar Usuário' )
@section('card-content')

    {!! Form::open(['route' => ['users.update', $user], 'method' => 'patch']) !!}
    <div class="col-lg-12">

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('admin.shared.input',
                ['id' => 'nome', 'type' => 'text', 'name' => 'nome', 'value' => $user->nome])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'cargo_id', 'label' => 'Cargo'])
            @include('admin.shared.select_with_id',
                ['id' => 'cargo_id', 'name' => 'cargo_id', 'dados' => $cargos,
                'value' => $user->cargo_id])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'secao_id', 'label' => 'Seção'])
            @include('admin.shared.select_with_id',
                ['id' => 'secao_id', 'name' => 'secao_id', 'dados' => $secoes,
                'value' => $user->secao_id])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'email', 'label' => 'Email'])

            @include('admin.shared.input',
            ['id' => 'email', 'type' => 'email', 'name' => 'email', 'value' => $user->email])
        </div>

        {{--<div class="form-group row">--}}
            {{--@include('admin.shared.label', ['for_label' => 'password', 'label' => 'Senha Atual'])--}}
            {{--@include('admin.shared.input',--}}
            {{--['id' => 'password', 'type' => 'password', 'name' => 'current_password'])--}}
        {{--</div>--}}

        {{--<div class="form-group row">--}}
            {{--@include('admin.shared.label', ['for_label' => 'new_password', 'label' => 'Nova Senha'])--}}
            {{--@include('admin.shared.input',--}}
            {{--['id' => 'new_password', 'type' => 'password', 'name' => 'new_password'])--}}
        {{--</div>--}}

        {{--<div class="form-group row">--}}
            {{--@include('admin.shared.label', ['for_label' => 'confirm_new_password', 'label' => 'Confirmar Nova Senha'])--}}

                {{--@include('admin.shared.input',--}}
            {{--['id' => 'confirm_new_password', 'type' => 'password', 'name' => 'confirm_new_password'])--}}
        {{--</div>--}}
        <div class="col-lg-10 float-right">
            <a class="btn btn-secondary" href="{{ route('users.index') }}">Voltar</a>

            <button class="btn btn-success" type="submit">Salvar Alterações</button>
            {{ Form::close() }}
        </div>
    </div>
@endsection
