@extends('layout.card')
@section('size', "col-md-8")
@section('card-name', 'Cadastrar Calibre' )
@section('card-content')
    {!! Form::open(['route' => 'calibres.store']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('admin.shared.input', ['name' => 'nome'])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'tipo_arma', 'label' => 'Utilizado em:'])
            @include('admin.shared.select_with_array',
                ['name' => 'tipo_arma', 'dados' => ['Espingarda', 'Revólver', 'Pistola'], 'value' => ""])
        </div>

        <div class="col-lg-10 float-right">
            <a class="btn btn-secondary" href="{{ route('calibres.index') }}">Voltar</a>
            <button class="btn btn-success" type="submit">Cadastrar</button>
            {{ Form::close() }}
        </div>
    </div>
    </div>
@endsection
