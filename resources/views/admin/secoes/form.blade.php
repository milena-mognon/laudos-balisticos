@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => 'secoes.store']) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['secoes.update', $secao], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

@include('admin.attributes.nome', ['nome' => $secao->nome ?? old('nome')])

<div class="col-lg-10 float-right">
    <a class="btn btn-secondary" href="{{ route('secoes.index') }}">Voltar</a>
    <button class="btn btn-success" type="submit">{{ $acao }}</button>
</div>

{{ Form::close() }}