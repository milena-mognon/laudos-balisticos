@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => ['armas.store', $laudo_id ]]) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['armas.update', $laudo_id, $arma], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

<input type="hidden" name="laudo_id" id="laudo_id" value="{{ $laudo_id }}">
<input type="hidden" name="tipo_arma" id="tipo_arma" value="Revólver">

<div class="col-lg-12" style="padding: 0 5% 0">
    <div class="row mb-3">
        @include('perito.attributes2.marca', ['marcas' => $marcas, 'marca2' =>  $arma->marca->id ?? old('marca_id')])
        @include('perito.attributes2.modelo', ['modelo' => $arma->modelo ?? old('modelo')])
        @include('perito.attributes2.origem', ['origens' => $origens, 'origem2' =>  $arma->origem->id ?? old('origem_id')])
        @include('perito.attributes2.calibre', ['calibres' => $calibres, 'calibre2' =>  $arma->calibre->id ?? old('calibre_id')])
        @include('perito.attributes2.serie', ['tipo_serie2' =>  $arma->tipo_serie ?? old('tipo_serie'), 'num_serie' =>  $arma->num_serie ?? old('num_serie')])
        @include('perito.attributes2.tambor', ['tambor_rebate2' =>  $arma->tambor_rebate ?? old('tambor_rebate')])
        @include('perito.attributes2.capacidade_tambor', ['capacidade_tambor' =>  $arma->capacidade_tambor ?? old('capacidade_tambor')])
        @include('perito.attributes2.sistema_percussao', ['sistema_percussao2' =>  $arma->sistema_percussao ?? old('sistema_percussao')])
        @include('perito.attributes2.tipo_acabamento', ['tipo_acabamento2' =>  $arma->tipo_acabamento ?? old('tipo_acabamento')])
        @include('perito.attributes2.cabo', ['cabo2' =>  $arma->cabo ?? old('cabo')])
        @include('perito.attributes2.estado_geral', ['estado_geral2' =>  $arma->estado_geral ?? old('estado_geral')])
        @include('perito.attributes2.comprimento', ['comprimento_total' =>  $arma->comprimento_total ?? old('comprimento_total')])
        @include('perito.attributes2.altura', ['altura' => $arma->altura ?? old('altura')])
        @include('perito.attributes2.comprimento_cano', ['comprimento_cano' =>  $arma->comprimento_cano ?? old('comprimento_cano')])
        @include('perito.attributes2.quantidade_raias', ['quantidade_raias' =>  $arma->quantidade_raias ?? old('quantidade_raias')])
        @include('perito.attributes2.sentido_raias', ['sentido_raias2' =>  $arma->sentido_raias ?? old('sentido_raias')])
        @include('perito.attributes2.funcionamento', ['funcionamento2' =>  $arma->funcionamento ?? old('funcionamento')])
        @include('perito.attributes2.lacre', ['num_lacre' =>  $arma->num_lacre ?? old('num_lacre')])
    </div>
    <div class="row">
        <div class="col-lg-4">
            <button type="submit" class="btn btn-outline-success btn-block"><strong>{{ $acao }}</strong></button>
            {{ Form::close() }}
        </div>
        <input type="hidden" name="img" id="ref_imagem">
        <div class="col-lg-4">
            <button class="btn btn-outline-primary btn-block" type="button" id="addImagem"><strong>Adicionar
                    Imagem</strong></button>
        </div>
        <div class="col-lg-4" id="div-button-imagem">
            <button class="btn btn-outline-primary btn-block" type="button" id="visualizarImagem"><strong>Visualizar
                    Imagem</strong></button>
        </div>
    </div>
</div>
@include('perito.modals.all_modals')