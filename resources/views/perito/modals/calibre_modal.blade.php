@component('layout.modal')
@slot('modal_id')
calibre-modal
@endslot
@slot('modal_title')
Cadastrar Calibre
@endslot
<div class="form-group">
    <label>Calibre: *</label>
    <input class="form-control" type="text" id="nome_calibre" name="calibre" autocomplete="off" />

    <label>Tipo: *</label>
    <select class="form-control" name="tipo" id="tipo_calibre">
        <option value="espingarda">Espingarda</option>
        <option value="pistola">Pistola</option>
        <option value="revolver">Revolver</option>
    </select>
    <p>* Obrigatório</p>
    <button type="button" class="btn btn-primary" id="cadastroCalibre">Cadastrar</button>
</div>
@endcomponent