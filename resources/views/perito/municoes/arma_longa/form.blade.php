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
        @include('perito.attributes2.tipo_municao', ['tipo_municao2' =>  $municao->tipo_municao ?? old('tipo_municao')])
        @include('perito.attributes2.marca', ['marca2' =>  $municao->marca->id ?? old('marca_id')])
        @include('perito.attributes2.calibre', ['calibre2' =>  $municao->calibre->id ?? old('calibre_id')])
        @include('perito.attributes2.quantidade', ['quantidade' =>  $municao->quantidade ?? old('quantidade')])
        @include('perito.attributes2.estojo', ['estojo2' =>  $municao->estojo ?? old('estojo')])
        @include('perito.attributes2.projetil_arma_longa', ['projetil2' =>  $municao->projetil ?? old('projetil')])
        @include('perito.attributes2.tipo_projetil', ['tipo_projetil2' =>  $municao->tipo_projetil ?? old('tipo_projetil')])
        @include('perito.attributes2.funcionamento', ['funcionamento2' =>  $municao->funcionamento ?? old('funcionamento')])
        @include('perito.attributes2.nao_deflagrado', ['nao_deflagrado' =>  $municao->nao_deflagrado ?? old('nao_deflagrado')])
    </div>
    <div class="row justify-content-between mb-4">
        <div class="col-lg-4 mt-1">
            <a class="btn btn-secondary btn-block" href="{{ route('laudos.materiais', $laudo) }}">
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