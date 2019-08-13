@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => 'solicitantes.store']) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['solicitantes.update', $solicitante], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

<div class="row">
    <div class="col-md-4" id="imagem"></div>

    <div class="col-lg-8">
        @include('admin.shared.attributes.nome', ['nome' => $solicitante->nome ?? old('nome')])
        @include('shared.attributes.cidades', ['cidade2' =>  $solicitante->cidade_id ?? old('cidade_id')])

        @include('admin.shared.buttons', ['acao' => $acao, 'voltar_route' => route('solicitantes.index')])

        {{ Form::close() }}
    </div>
</div>