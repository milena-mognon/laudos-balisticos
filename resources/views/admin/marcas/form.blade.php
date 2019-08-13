@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => 'marcas.store']) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['marcas.update', $marca], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif
<div class="row">
    <div class="col-md-4" id="imagem"></div>

    <div class="col-lg-8">
        @include('admin.shared.attributes.nome', ['nome' => $marca->nome ?? old('nome')])
        @include('admin.shared.attributes.categoria', ['categoria2' => $marca->categoria ?? old('categoria')])

        @include('admin.shared.buttons', ['acao' => $acao, 'voltar_route' => route('marcas.index')])

        {{ Form::close() }}
    </div>
</div>