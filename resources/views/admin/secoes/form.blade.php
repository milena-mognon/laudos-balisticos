@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => 'secoes.store']) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['secoes.update', $secao], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

<div class="row">
    <div class="col-md-4" id="imagem"></div>

    <div class="col-lg-8">
        @include('admin.attributes.nome', ['nome' => $secao->nome ?? old('nome')])

        @include('admin.shared.buttons', ['acao' => $acao, 'voltar_route' => route('secoes.index')])

        {{ Form::close() }}
    </div>
</div>