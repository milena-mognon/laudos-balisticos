@section('js')
    {!! Html::script('js/form_pistola.js') !!}
@endsection
@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => ['pistolas.store', $laudo ]]) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['pistolas.update', $laudo, $pistola], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

<input type="hidden" name="laudo_id" id="laudo_id" value="{{ $laudo->id }}">
<input type="hidden" name="tipo_arma" id="tipo_arma" value="Pistola">

<div class="col-lg-12" style="padding: 0 5% 0">
    <div class="row mb-3">
        @include('perito.laudo.materiais.attributes.marca', ['marca2' =>  $pistola->marca->id ?? old('marca_id')])
        @include('perito.laudo.materiais.attributes.modelo', ['modelo' => $revolver->modelo ?? old('modelo')])
        @include('perito.laudo.materiais.attributes.origem', ['origem2' =>  $pistola->origem->id ?? old('origem_id')])
        @include('perito.laudo.materiais.attributes.calibre', ['obrigatorio' => true,'calibre2' =>  $pistola->calibre->id ?? old('calibre_id')])
        @include('perito.laudo.materiais.attributes.serie', ['tipo_serie2' =>  $pistola->tipo_serie ?? old('tipo_serie'), 'num_serie' =>  $pistola->num_serie ?? old('num_serie')])
        @include('perito.laudo.materiais.attributes.carregamento', ['carregamento2' =>  $pistola->carregamento ?? old('carregamento')])
        @include('perito.laudo.materiais.attributes.cao', ['cao2' =>  $pistola->cao ?? old('cao')])
        @include('perito.laudo.materiais.attributes.carregador', ['carregador2' =>  $pistola->carregador ?? old('carregador')])
        @include('perito.laudo.materiais.attributes.capacidade_carregador', ['capacidade_carregador' =>  $pistola->capacidade_carregador ?? old('capacidade_carregador')])
        @include('perito.laudo.materiais.attributes.retem_carregador', ['retem_carregador2' =>  $pistola->retem_carregador ?? old('retem_carregador')])
        @include('perito.laudo.materiais.attributes.trava_ferrolho', ['trava_ferrolho2' =>  $pistola->trava_ferrolho ?? old('trava_ferrolho')])
        @include('perito.laudo.materiais.attributes.trava_gatilho', ['trava_gatilho2' =>  $pistola->trava_gatilho ?? old('trava_gatilho')])
        @include('perito.laudo.materiais.attributes.trava_seguranca', ['trava_seguranca2' =>  $pistola->trava_seguranca ?? old('trava_seguranca')])
        @include('perito.laudo.materiais.attributes.tipo_acabamento', ['tipo_acabamento2' =>  $pistola->tipo_acabamento ?? old('tipo_acabamento')])
        @include('perito.laudo.materiais.attributes.cabo', ['cabo2' =>  $pistola->cabo ?? old('cabo')])
        @include('perito.laudo.materiais.attributes.estado_geral', ['estado_geral2' =>  $pistola->estado_geral ?? old('estado_geral')])
        @include('perito.laudo.materiais.attributes.comprimento', ['comprimento_total' =>  $pistola->comprimento_total ?? old('comprimento_total')])
        @include('perito.laudo.materiais.attributes.altura', ['altura' => $pistola->altura ?? old('altura')])
        @include('perito.laudo.materiais.attributes.comprimento_cano', ['comprimento_cano' =>  $pistola->comprimento_cano ?? old('comprimento_cano')])
        @include('perito.laudo.materiais.attributes.quantidade_raias', ['quantidade_raias' =>  $pistola->quantidade_raias ?? old('quantidade_raias')])
        @include('perito.laudo.materiais.attributes.sentido_raias', ['sentido_raias2' =>  $pistola->sentido_raias ?? old('sentido_raias')])
        @include('perito.laudo.materiais.attributes.funcionamento', ['funcionamento2' =>  $pistola->funcionamento ?? old('funcionamento')])
        @include('perito.laudo.materiais.attributes.lacre', ['num_lacre' =>  $pistola->num_lacre ?? old('num_lacre')])
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
{{--@include('perito.modals.all_modals')--}}