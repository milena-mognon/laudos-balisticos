@extends('new_layout.component')
@section('page')

    <div class="col-8">
        <h4>Editar Seção</h4>
    </div>
    <hr>
    {!! Form::open(['route' => ['secoes.update', $secao], 'method' => 'patch']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('shared.input', ['name' => 'nome', 'value' => $secao->nome])
        </div>

        <div class="col-lg-10 float-right">
            <a class="btn btn-secondary" href="{{ route('secoes.index') }}">Voltar</a>
            <button class="btn btn-success" type="submit">Editar</button>
            {{ Form::close() }}
        </div>
    </div>
@endsection
