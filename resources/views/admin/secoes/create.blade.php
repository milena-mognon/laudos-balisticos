@extends('layout.card')
@section('size', "col-md-8")
@section('card-name', 'Seção' )
@section('card-content')
    {!! Form::open(['route' => 'secoes.store']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'nome', 'label' =>  'Nome'])
            @include('admin.shared.input', ['name' => 'nome'])
        </div>

        <div class="col-lg-10 float-right">
            <a class="btn btn-secondary" href="{{ route('secoes.index') }}">Voltar</a>

            <button class="btn btn-success" type="submit">Cadastrar</button>
            {{ Form::close() }}
        </div>
    </div>
@endsection
