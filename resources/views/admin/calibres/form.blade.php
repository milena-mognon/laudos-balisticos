@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => 'calibres.store']) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['calibres.update', $calibre], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

<div class="row">
    <div class="col-md-4" id="imagem"></div>

    <div class="col-lg-8">

        @include('admin.attributes.nome', ['nome' => $calibre->nome ?? old('nome')])
        @include('admin.attributes.tipo_arma', ['tipo_arma2' => $calibre->tipo_arma ?? old('tipo_arma')])
        @include('admin.shared.buttons', ['acao' => $acao, 'voltar_route' => route('calibres.index')])
        {{ Form::close() }}
    </div>
</div>