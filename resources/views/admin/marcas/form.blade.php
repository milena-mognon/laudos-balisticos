@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => 'marcas.store']) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['marcas.update', $marca], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

@include('admin.attributes.nome', ['nome' => $marca->nome ?? old('nome')])
@include('admin.attributes.categoria', ['categoria2' => $marca->categoria ?? old('categoria')])

<div class="col-lg-10 float-right">
    <a class="btn btn-secondary" href="{{ route('marcas.index') }}">Voltar</a>
    <button class="btn btn-success" type="submit">{{ $acao }}</button>
</div>
{{ Form::close() }}