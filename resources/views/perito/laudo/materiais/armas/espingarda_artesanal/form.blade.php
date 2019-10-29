@if ($acao == 'Cadastrar')
{!! Form::open(['route' => ['espingardas_artesanais.store', $laudo ]]) !!}
@elseif ($acao == 'Atualizar')
{!! Form::open(['route' => ['espingardas_artesanais.update', $laudo, $espingarda], 'method' => 'patch']) !!}
@else
{!! Form::open() !!}
@endif

<input type="hidden" name="laudo_id" id="laudo_id" value="{{ $laudo->id }}">
<input type="hidden" name="tipo_arma" id="tipo_arma" value="Espingarda Artesanal">

<div class="col-lg-12" style="padding: 0 5% 0">
    <div class="row mb-3">
        @include('perito.laudo.materiais.attributes.calibre', ['obrigatorio' => false, 'calibre2' =>
        $espingarda->calibre->id ?? old('calibre_id')])
        @include('perito.laudo.materiais.attributes.calibre_real', ['calibre_real' => $espingarda->calibre_real ??
        old('calibre_real')])
        @include('perito.laudo.materiais.attributes.coronha_fuste', ['coronha_fuste2' => $espingarda->coronha_fuste ??
        old('coronha_fuste')])
        @include('perito.laudo.materiais.attributes.bandoleira', ['bandoleira2' => $espingarda->bandoleira ??
        old('bandoleira')])
        @include('perito.laudo.materiais.attributes.estado_geral', ['estado_geral2' => $espingarda->estado_geral ??
        old('estado_geral')])
        @include('perito.laudo.materiais.attributes.comprimento', ['comprimento_total' => $espingarda->comprimento_total
        ?? old('comprimento_total')])
        @include('perito.laudo.materiais.attributes.comprimento_cano', ['comprimento_cano' =>
        $espingarda->comprimento_cano ?? old('comprimento_cano')])
        @include('perito.laudo.materiais.attributes.funcionamento', ['funcionamento2' => $espingarda->funcionamento ??
        old('funcionamento')])
        @include('perito.laudo.materiais.attributes.lacre', ['num_lacre' => $espingarda->num_lacre ?? old('num_lacre')])
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
            <button type="submit" class="btn btn-success btn-block"><strong>
                    <i class="fas fa-plus" aria-hidden="true"></i> {{ $acao }}</strong>
            </button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@include('perito.modals.calibre_modal')
@if($acao == 'Atualizar')
@include('perito.modals.visualizar_imagens_modal', ['arma_id' => $espingarda->id])
@endif