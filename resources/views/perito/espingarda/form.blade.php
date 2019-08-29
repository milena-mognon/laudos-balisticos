@section('js')
    {!! Html::script('js/form_espingarda.js') !!}
@endsection

@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => ['espingardas.store', $laudo ]]) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['espingardas.update', $laudo, $espingarda], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

<input type="hidden" name="laudo_id" id="laudo_id" value="{{ $laudo->id }}">
<input type="hidden" name="tipo_arma" id="tipo_arma" value="Espingarda">

<div class="col-lg-12" style="padding: 0 5% 0">
    <div class="row mb-3">
        @include('perito.attributes2.marca', ['marca2' =>  $espingarda->marca->id ?? old('marca_id')])
        @include('perito.attributes2.origem', ['origem2' =>  $espingarda->origem->id ?? old('origem_id')])
        @include('perito.attributes2.calibre', ['calibre2' =>  $espingarda->calibre->id ?? old('calibre_id')])
        @include('perito.attributes2.serie', ['tipo_serie2' =>  $espingarda->tipo_serie ?? old('tipo_serie'), 'num_serie' =>  $espingarda->num_serie ?? old('num_serie')])

        @include('perito.attributes2.sistema_funcionamento', ['sistema_funcionamento2' =>  $espingarda->sistema_funcionamento ?? old('sistema_funcionamento')])
        @include('perito.attributes2.tipo_carregador', ['tipo_carregador2' =>  $espingarda->tipo_carregador ?? old('tipo_carregador')])
        @include('perito.attributes2.numero_canos', ['num_canos2' =>  $espingarda->num_canos ?? old('num_canos')])
        @include('perito.attributes2.disposicao_canos', ['disposicao_canos2' =>  $espingarda->disposicao_canos ?? old('disposicao_canos')])
        @include('perito.attributes2.teclas_gatilho', ['teclas_gatilho2' =>  $espingarda->teclas_gatilho ?? old('teclas_gatilho')])
        @include('perito.attributes2.sistema_carregamento', ['sistema_carregamento2' =>  $espingarda->sistema_carregamento ?? old('sistema_carregamento')])
        @include('perito.attributes2.chave_abertura', ['chave_abertura2' =>  $espingarda->chave_abertura ?? old('chave_abertura')])
        @include('perito.attributes2.sistema_engatilhamento', ['sistema_engatilhamento2' =>  $espingarda->sistema_engatilhamento ?? old('sistema_engatilhamento')])
        @include('perito.attributes2.tipo_acabamento', ['tipo_acabamento2' =>  $espingarda->tipo_acabamento ?? old('tipo_acabamento')])
        @include('perito.attributes2.coronha_fuste', ['coronha_fuste2' =>  $espingarda->coronha_fuste ?? old('coronha_fuste')])
        @include('perito.attributes2.sistema_percussao', ['sistema_percussao2' =>  $espingarda->sistema_percussao ?? old('sistema_percussao')])
        @include('perito.attributes2.estado_geral', ['estado_geral2' =>  $espingarda->estado_geral ?? old('estado_geral')])
        @include('perito.attributes2.comprimento', ['comprimento_total' =>  $espingarda->comprimento_total ?? old('comprimento_total')])
        @include('perito.attributes2.comprimento_cano', ['comprimento_cano' =>  $espingarda->comprimento_cano ?? old('comprimento_cano')])
        @include('perito.attributes2.funcionamento', ['funcionamento2' =>  $espingarda->funcionamento ?? old('funcionamento')])
        @include('perito.attributes2.lacre', ['num_lacre' =>  $espingarda->num_lacre ?? old('num_lacre')])
    </div>
    <div class="row">
        <div class="col-lg-4 mb-4">
            <button type="submit" class="btn btn-success btn-block"><strong>
                    <i class="fas fa-plus" aria-hidden="true"></i> {{ $acao }}</strong>
            </button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@include('perito.modals.all_modals')