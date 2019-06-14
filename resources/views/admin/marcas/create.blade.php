@extends('layout.card')
@section('size', "col-md-8")
@section('card-name', 'Cadastrar Marca' )
@section('card-content')
    {!! Form::open(['route' => 'marcas.store']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('admin.shared.input',
                ['id' => 'nome', 'type' => 'text', 'name' => 'nome'])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'categoria', 'label' => 'Categoria'])
            <div class="col-md-8">
                <select name="categoria" id="categoria" class="form-control {{ $errors->has('categoria') ? ' is-invalid' : '' }}">
                    <option>Armas</option>
                    <option>Munições</option>
                </select>
            </div>
        </div>
        @if ($errors->has('caegoria'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('categoria') }}</strong>
        </span>
        @endif

        <div class="col-lg-10 float-right">
            <a class="btn btn-secondary" href="{{ route('marcas.index') }}">Voltar</a>
            <button class="btn btn-success" type="submit">Cadastrar</button>
            {{ Form::close() }}
        </div>
    </div>
    </div>
@endsection
