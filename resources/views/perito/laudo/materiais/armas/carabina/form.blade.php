@if ($acao == 'Cadastrar')
{!! Form::open(['route' => ['carabinas.store', $laudo ]]) !!}
@elseif ($acao == 'Atualizar')
{!! Form::open(['route' => ['carabinas.update', $laudo, $carabina], 'method' => 'patch']) !!}
@else
{!! Form::open() !!}
@endif

<input type="hidden" name="laudo_id" id="laudo_id" value="{{ $laudo->id }}">
<input type="hidden" name="tipo_arma" id="tipo_arma" value="Carabina">

<div class="col-lg-12" style="padding: 0 5% 0">
    <div class="row mb-3">
        @include('perito.laudo.materiais.attributes.marca', ['marca2' => $carabina->marca->id ?? old('marca_id')])
        @include('perito.laudo.materiais.attributes.origem', ['origem2' => $carabina->origem->id ?? old('origem_id')])
        @include('perito.laudo.materiais.attributes.calibre', ['calibre2' => $carabina->calibre->id ??
        old('calibre_id')])
        @include('perito.laudo.materiais.attributes.calibre_real', ['calibre_real' => $carabina->calibre_real ??
        old('calibre_real')])
        @include('perito.laudo.materiais.attributes.serie', ['tipo_serie2' => $carabina->tipo_serie ??
        old('tipo_serie'), 'num_serie' => $carabina->num_serie ?? old('num_serie')])
        @include('perito.laudo.materiais.attributes.numeracao_montagem', ['numeracao_montagem' =>
        $carabina->numeracao_montagem ?? old('numeracao_montagem')])
        @include('perito.laudo.materiais.attributes.sistema_funcionamento', ['sistema_funcionamento2' =>
        $carabina->sistema_funcionamento ?? old('sistema_funcionamento')])
        @include('perito.laudo.materiais.attributes.tipo_carregador', ['tipo_carregador2' => $carabina->tipo_carregador
        ?? old('tipo_carregador')])
        @include('perito.laudo.materiais.attributes.numero_canos', ['num_canos2' => $carabina->num_canos ??
        old('num_canos')])
        @include('perito.laudo.materiais.attributes.disposicao_canos', ['disposicao_canos2' =>
        $carabina->disposicao_canos ?? old('disposicao_canos')])
        @include('perito.laudo.materiais.attributes.teclas_gatilho', ['teclas_gatilho2' => $carabina->teclas_gatilho ??
        old('teclas_gatilho')])
        @include('perito.laudo.materiais.attributes.sistema_carregamento', ['sistema_carregamento2' =>
        $carabina->sistema_carregamento ?? old('sistema_carregamento')])
        @include('perito.laudo.materiais.attributes.chave_abertura', ['chave_abertura2' => $carabina->chave_abertura ??
        old('chave_abertura')])
        @include('perito.laudo.materiais.attributes.sistema_engatilhamento', ['sistema_engatilhamento2' =>
        $carabina->sistema_engatilhamento ?? old('sistema_engatilhamento')])
        @include('perito.laudo.materiais.attributes.tipo_acabamento', ['tipo_acabamento2' => $carabina->tipo_acabamento
        ?? old('tipo_acabamento')])
        @include('perito.laudo.materiais.attributes.coronha_fuste', ['coronha_fuste2' => $carabina->coronha_fuste ??
        old('coronha_fuste')])
        @include('perito.laudo.materiais.attributes.bandoleira', ['bandoleira2' => $carabina->bandoleira ??
        old('bandoleira')])
        @include('perito.laudo.materiais.attributes.sistema_percussao', ['sistema_percussao2' =>
        $carabina->sistema_percussao ?? old('sistema_percussao')])
        @include('perito.laudo.materiais.attributes.quantidade_raias', ['quantidade_raias' =>
        $carabina->quantidade_raias ?? old('quantidade_raias')])
        @include('perito.laudo.materiais.attributes.sentido_raias', ['sentido_raias2' => $carabina->sentido_raias ??
        old('sentido_raias')])
        @include('perito.laudo.materiais.attributes.estado_geral', ['estado_geral2' => $carabina->estado_geral ??
        old('estado_geral')])
        @include('perito.laudo.materiais.attributes.comprimento', ['comprimento_total' => $carabina->comprimento_total
        ?? old('comprimento_total')])
        @include('perito.laudo.materiais.attributes.comprimento_cano', ['comprimento_cano' =>
        $carabina->comprimento_cano ?? old('comprimento_cano')])
        @include('perito.laudo.materiais.attributes.funcionamento', ['funcionamento2' => $carabina->funcionamento ??
        old('funcionamento')])
        @include('perito.laudo.materiais.attributes.lacre', ['num_lacre' => $carabina->num_lacre ?? old('num_lacre')])
    </div>
    <div class="row justify-content-between mb-4">
        <div class="col-lg-4 mt-1">
            <a class="btn btn-secondary btn-block" href="{!! URL::previous() !!}">
                <i class="fas fa-arrow-circle-left"></i> Voltar</a>
        </div>
        @if($acao == 'Atualizar')
        <div class="col-lg-4 mt-1">
            <button class="btn btn-primary btn-block ver_imagens" type="button">
                <i class="fas fa-camera"></i> Visualizar Imagens</button>
        </div>
        @endif
        <div class="col-lg-4 mt-1">
            <button type="submit" class="btn btn-success btn-block submit_arma_form"><strong>
                    <i class="fas fa-plus" aria-hidden="true"></i> {{ $acao }}</strong>
            </button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@include('perito.modals.calibre_modal')
@include('perito.modals.marca_modal')
@include('perito.modals.pais_modal')