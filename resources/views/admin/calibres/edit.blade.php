@extends('new_layout.component')
@section('page')
    <div class="col-8">
        <h4>Editar Calibre</h4>
    </div>
    <hr>
    {!! Form::open(['route' => ['calibres.update', $calibre], 'method' => 'patch']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('shared.input',
                ['name' => 'nome', 'value' => $calibre->nome])
        </div>

        <div class="form-group row">
            @include('shared.label', ['for_label' => 'tipo_arma', 'label' => 'Utilizado em:'])
            @include('shared.select_with_array',
                ['name' => 'tipo_arma', 'dados' => ['Espingarda', 'Revólver', 'Pistola'], 'value' => $calibre->tipo_arma])
        </div>

        <div class="col-lg-10 float-right">
            <a class="btn btn-secondary" href="{{ route('calibres.index') }}">Voltar</a>
            <button class="btn btn-success " type="submit">Editar</button>
            {{ Form::close() }}
        </div>
    </div>
    </div>
@endsection
