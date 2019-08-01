@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => 'origens.store']) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['origens.update', $origem], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

@include('admin.attributes.nome', ['nome' => $origem->nome ?? old('nome')])
@include('admin.attributes.fabricacao', ['fabricacao' => $origem->fabricacao ?? old('fabricacao')])

<div class="col-lg-10 float-right">
    <a class="btn btn-secondary" href="{{ route('origens.index') }}">Voltar</a>
    <button class="btn btn-success" type="submit">{{ $acao }}</button>
</div>
{{ Form::close() }}