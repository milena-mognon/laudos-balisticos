@section('js')
    {!! Html::script('js/form_municoes.js') !!}
@endsection

@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => ['municoes.store', $laudo ]]) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['municoes.update', $laudo, $municao], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

<input type="hidden" name="laudo_id" id="laudo_id" value="{{ $laudo->id }}">

<div class="col-lg-12" style="padding: 0 5% 0">
    <div class="row mb-3">
        @include('perito.laudo.materiais.attributes.tipo_municao', ['tipo_municao2' =>  $municao->tipo_municao ?? old('tipo_municao')])
        @include('perito.laudo.materiais.attributes.marca', ['marca2' =>  $municao->marca->id ?? old('marca_id')])
        @include('perito.laudo.materiais.attributes.calibre', ['calibre2' =>  $municao->calibre->id ?? old('calibre_id')])
        @include('perito.laudo.materiais.attributes.quantidade', ['quantidade' =>  $municao->quantidade ?? old('quantidade')])
        @include('perito.laudo.materiais.attributes.estojo', ['estojo2' =>  $municao->estojo ?? old('estojo')])
        @include('perito.laudo.materiais.attributes.projetil_arma_longa', ['projetil2' =>  $municao->projetil ?? old('projetil')])
        @include('perito.laudo.materiais.attributes.tipo_projetil', ['tipo_projetil2' =>  $municao->tipo_projetil ?? old('tipo_projetil')])
        @include('perito.laudo.materiais.attributes.funcionamento', ['funcionamento2' =>  $municao->funcionamento ?? old('funcionamento')])
        @include('perito.laudo.materiais.attributes.nao_deflagrado', ['nao_deflagrado' =>  $municao->nao_deflagrado ?? old('nao_deflagrado')])
    </div>
    <div class="row justify-content-between mb-4">
        <div class="col-lg-4 mt-1">
            <a class="btn btn-secondary btn-block" href="{!! URL::previous() !!}">
                <i class="fas fa-arrow-circle-left"></i> Voltar</a>
        </div>
        <div class="col-lg-4 mt-1">
            <button type="submit" class="btn btn-success btn-block submit_arma_form"><strong>
                    <i class="fas fa-plus" aria-hidden="true"></i> {{ $acao }}</strong>
            </button>
            {{ Form::close() }}
        </div>
    </div>
</div>