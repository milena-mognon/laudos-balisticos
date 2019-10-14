@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => ['revolveres.store', $laudo ]]) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['revolveres.update', $laudo, $revolver], 'method' => 'patch'], 'disabled') !!}
@else
    {!! Form::open() !!}
@endif

<input type="hidden" name="laudo_id" id="laudo_id" value="{{ $laudo->id }}">
<input type="hidden" name="tipo_arma" id="tipo_arma" value="Revólver">

<div class="col-lg-12" style="padding: 0 5% 0">
    <div class="row mb-3">
        @include('perito.laudo.materiais.attributes.marca', ['marca2' =>  $revolver->marca->id ?? old('marca_id')])
        @include('perito.laudo.materiais.attributes.modelo', ['modelo' => $revolver->modelo ?? old('modelo')])
        @include('perito.laudo.materiais.attributes.origem', ['origem2' =>  $revolver->origem->id ?? old('origem_id')])
        @include('perito.laudo.materiais.attributes.calibre', ['obrigatorio' => true,'calibre2' =>  $revolver->calibre->id ?? old('calibre_id')])
        @include('perito.laudo.materiais.attributes.serie', ['tipo_serie2' =>  $revolver->tipo_serie ?? old('tipo_serie'), 'num_serie' =>  $revolver->num_serie ?? old('num_serie')])
        @include('perito.laudo.materiais.attributes.numeracao_montagem', ['numeracao_montagem' =>  $revolver->numeracao_montagem ?? old('numeracao_montagem')])
        @include('perito.laudo.materiais.attributes.tambor', ['tambor_rebate2' =>  $revolver->tambor_rebate ?? old('tambor_rebate')])
        @include('perito.laudo.materiais.attributes.capacidade_tambor', ['capacidade_tambor' =>  $revolver->capacidade_tambor ?? old('capacidade_tambor')])
        @include('perito.laudo.materiais.attributes.sistema_percussao', ['sistema_percussao2' =>  $revolver->sistema_percussao ?? old('sistema_percussao')])
        @include('perito.laudo.materiais.attributes.tipo_acabamento', ['tipo_acabamento2' =>  $revolver->tipo_acabamento ?? old('tipo_acabamento')])
        @include('perito.laudo.materiais.attributes.cabo', ['cabo2' =>  $revolver->cabo ?? old('cabo')])
        @include('perito.laudo.materiais.attributes.estado_geral', ['estado_geral2' =>  $revolver->estado_geral ?? old('estado_geral')])
        @include('perito.laudo.materiais.attributes.comprimento', ['comprimento_total' =>  $revolver->comprimento_total ?? old('comprimento_total')])
        @include('perito.laudo.materiais.attributes.altura', ['altura' => $revolver->altura ?? old('altura')])
        @include('perito.laudo.materiais.attributes.comprimento_cano', ['comprimento_cano' =>  $revolver->comprimento_cano ?? old('comprimento_cano')])
        @include('perito.laudo.materiais.attributes.quantidade_raias', ['quantidade_raias' =>  $revolver->quantidade_raias ?? old('quantidade_raias')])
        @include('perito.laudo.materiais.attributes.sentido_raias', ['sentido_raias2' =>  $revolver->sentido_raias ?? old('sentido_raias')])
        @include('perito.laudo.materiais.attributes.funcionamento', ['funcionamento2' =>  $revolver->funcionamento ?? old('funcionamento')])
        @include('perito.laudo.materiais.attributes.lacre', ['num_lacre' =>  $revolver->num_lacre ?? old('num_lacre')])
        <hr>


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