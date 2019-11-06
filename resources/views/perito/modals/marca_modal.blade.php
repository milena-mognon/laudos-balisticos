@component('layout.modal')
@slot('modal_id')
marca-modal
@endslot
@slot('modal_title')
Cadastrar Marca
@endslot
@slot('modal_size')
md
@endslot
<hr>

<div class="form-group">
    <div class="col-lg-12">
        <label>Marca: *</label>
        <input class="form-control mb-2" type="text" id="nome" name="nome" autocomplete="off" />

        <label>Tipo: *</label>
        <select class="form-control js-single" name="categoria" id="categoria">
            <option value="Arma">Arma</option>
            <option value="Municao">Munição</option>
        </select>

        <p class="obrigatorio mt-2">* Obrigatório</p>
        <div class="row justify-content-between">
            <div class="col-lg-6 mb-2">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">
                    <i class="fas fa-times"></i> Fechar</button>
            </div>
            <div class="col-lg-6 mb-2">
                <button type="button" class="btn btn-success btn-block" id="cadastroMarca">
                    <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar</button>
            </div>
        </div>
    </div>
</div>
@endcomponent