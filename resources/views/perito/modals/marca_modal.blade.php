@component('shared.modal')
    @slot('modal_id')
        marca-modal
    @endslot
    @slot('modal_title')
        Cadastrar Marca
    @endslot
    <div class="form-group">
        <label>Marca: *</label>
        <input class="form-control" type="text" id="nome" name="nome" autocomplete="off"/>

        <label>Tipo: *</label>
        <select class="form-control" name="categoria" id="categoria">
            <option value="Arma">Arma</option>
            <option value="Municao">Munição</option>
        </select>

        <p>* Obrigatório</p>
        <button type="button" class="btn btn-primary" id="cadastroMarca">Cadastrar</button>
    </div>
@endcomponent
