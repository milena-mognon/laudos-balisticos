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
        @include('perito.armas.attributes2.marca', ['marca2' =>  $pistola->marca->id ?? old('marca_id')])
        @include('perito.armas.attributes2.origem', ['origem2' =>  $pistola->origem->id ?? old('origem_id')])
        @include('perito.armas.attributes2.calibre', ['calibre2' =>  $pistola->calibre->id ?? old('calibre_id')])
        @include('perito.armas.attributes2.serie', ['tipo_serie2' =>  $pistola->tipo_serie ?? old('tipo_serie'), 'num_serie' =>  $pistola->num_serie ?? old('num_serie')])
        @include('perito.armas.attributes2.numero_canos', ['num_canos2' =>  $pistola->num_canos ?? old('num_canos')])
        @include('perito.armas.attributes2.disposicao_canos', ['disposicao_canos2' =>  $pistola->disposicao_canos ?? old('disposicao_canos')])
        @include('perito.armas.attributes2.teclas_gatilho', ['teclas_gatilho2' =>  $pistola->teclas_gatilho ?? old('teclas_gatilho')])
        @include('perito.armas.attributes2.cao', ['cao2' =>  $pistola->cao ?? old('cao')])
        @include('perito.armas.attributes2.sistema_percussao', ['sistema_percussao2' =>  $pistola->sistema_percussao ?? old('sistema_percussao')])
        @include('perito.armas.attributes2.tipo_acabamento', ['tipo_acabamento2' =>  $pistola->tipo_acabamento ?? old('tipo_acabamento')])
        @include('perito.armas.attributes2.cabo', ['cabo2' =>  $pistola->cabo ?? old('cabo')])
        @include('perito.armas.attributes2.placas_laterais', ['placas_laterais2' =>  $pistola->placas_laterais ?? old('placas_laterais')])
        @include('perito.armas.attributes2.chave_abertura', ['chave_abertura2' =>  $pistola->chave_abertura ?? old('chave_abertura')])
        @include('perito.armas.attributes2.estado_geral', ['estado_geral2' =>  $pistola->estado_geral ?? old('estado_geral')])
        @include('perito.armas.attributes2.comprimento', ['comprimento_total' =>  $pistola->comprimento_total ?? old('comprimento_total')])
        @include('perito.armas.attributes2.altura', ['altura' => $pistola->altura ?? old('altura')])
        @include('perito.armas.attributes2.comprimento_cano', ['comprimento_cano' =>  $pistola->comprimento_cano ?? old('comprimento_cano')])
        @include('perito.armas.attributes2.quantidade_raias', ['quantidade_raias' =>  $pistola->quantidade_raias ?? old('quantidade_raias')])
        @include('perito.armas.attributes2.sentido_raias', ['sentido_raias2' =>  $pistola->sentido_raias ?? old('sentido_raias')])
        @include('perito.armas.attributes2.funcionamento', ['funcionamento2' =>  $pistola->funcionamento ?? old('funcionamento')])
        @include('perito.armas.attributes2.lacre', ['num_lacre' =>  $pistola->num_lacre ?? old('num_lacre')])
    </div>

    <div class="row justify-content-between mb-4">
        <div class="col-lg-4 mt-1">
            <a class="btn btn-secondary btn-block" href="{{ URL::previous() }}">
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
@include('perito.modals.all_modals')