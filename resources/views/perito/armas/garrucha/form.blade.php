@section('js')
    {!! Html::script('js/form_garrucha.js') !!}
@endsection
@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => ['garruchas.store', $laudo ]]) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['garruchas.update', $laudo, $garrucha], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

<input type="hidden" name="laudo_id" id="laudo_id" value="{{ $laudo->id }}">
<input type="hidden" name="tipo_arma" id="tipo_arma" value="Garrucha">

<div class="col-lg-12" style="padding: 0 5% 0">
    <div class="row mb-3">
        @include('perito.attributes2.marca', ['marca2' =>  $garrucha->marca->id ?? old('marca_id')])
        @include('perito.attributes2.origem', ['origem2' =>  $garrucha->origem->id ?? old('origem_id')])
        @include('perito.attributes2.calibre', ['calibre2' =>  $garrucha->calibre->id ?? old('calibre_id')])
        @include('perito.attributes2.serie', ['tipo_serie2' =>  $garrucha->tipo_serie ?? old('tipo_serie'), 'num_serie' =>  $garrucha->num_serie ?? old('num_serie')])
        @include('perito.attributes2.numero_canos', ['num_canos2' =>  $garrucha->num_canos ?? old('num_canos')])
        @include('perito.attributes2.disposicao_canos', ['disposicao_canos2' =>  $garrucha->disposicao_canos ?? old('disposicao_canos')])
        @include('perito.attributes2.teclas_gatilho', ['teclas_gatilho2' =>  $garrucha->teclas_gatilho ?? old('teclas_gatilho')])
        @include('perito.attributes2.cao', ['cao2' =>  $garrucha->cao ?? old('cao')])
        @include('perito.attributes2.sistema_percussao', ['sistema_percussao2' =>  $garrucha->sistema_percussao ?? old('sistema_percussao')])
        @include('perito.attributes2.tipo_acabamento', ['tipo_acabamento2' =>  $garrucha->tipo_acabamento ?? old('tipo_acabamento')])
        @include('perito.attributes2.cabo', ['cabo2' =>  $garrucha->cabo ?? old('cabo')])
        @include('perito.attributes2.placas_laterais', ['placas_laterais2' =>  $garrucha->placas_laterais ?? old('placas_laterais')])
        @include('perito.attributes2.chave_abertura', ['chave_abertura2' =>  $garrucha->chave_abertura ?? old('chave_abertura')])
        @include('perito.attributes2.estado_geral', ['estado_geral2' =>  $garrucha->estado_geral ?? old('estado_geral')])
        @include('perito.attributes2.comprimento', ['comprimento_total' =>  $garrucha->comprimento_total ?? old('comprimento_total')])
        @include('perito.attributes2.altura', ['altura' => $garrucha->altura ?? old('altura')])
        @include('perito.attributes2.comprimento_cano', ['comprimento_cano' =>  $garrucha->comprimento_cano ?? old('comprimento_cano')])
        @include('perito.attributes2.quantidade_raias', ['quantidade_raias' =>  $garrucha->quantidade_raias ?? old('quantidade_raias')])
        @include('perito.attributes2.sentido_raias', ['sentido_raias2' =>  $garrucha->sentido_raias ?? old('sentido_raias')])
        @include('perito.attributes2.funcionamento', ['funcionamento2' =>  $garrucha->funcionamento ?? old('funcionamento')])
        @include('perito.attributes2.lacre', ['num_lacre' =>  $garrucha->num_lacre ?? old('num_lacre')])
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