@component('layout.modal')
@slot('modal_id')
calibre-modal
@endslot
@slot('modal_title')
Cadastrar Calibre
@endslot
@slot('modal_size')
md
@endslot
<hr>

<div class="form-group">
    <div class="col-lg-12">
        <label>Calibre: *</label>
        <input class="form-control mb-2" type="text" id="nome_calibre" name="calibre" autocomplete="off" />

        @if (isset($tipo_arma))
        <input type="hidden" value="{{ $tipo_arma }}" name="tipo_arma" id="tipo_arma">
        @else
        <label>Em quais armas é utilizado: *</label>
        <select class="form-control js-multiple-limit-calibre" name="tipos_armas[]" multiple="multiple" id="tipo_arma">
            <option value="Carabina">Carabina</option>
            <option value="Espingarda">Espingarda</option>
            <option value="Garrucha">Garrucha</option>
            <option value="Pistola">Pistola</option>
            <option value="Revólver">Revolver</option>
        </select>
        @endif
        <p class="obrigatorio mt-2">* Obrigatório</p>
        <div class="row justify-content-between">
            <div class="col-lg-6 mb-2">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">
                    <i class="fas fa-times"></i> Fechar</button>
            </div>
            <div class="col-lg-6 mb-2">
                <button type="button" class="btn btn-success btn-block" id="cadastroCalibre">
                    <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar</button>

            </div>
        </div>
    </div>
</div>
@endcomponent