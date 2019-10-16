@component('layout.modal')
    @slot('modal_id')
        pais-modal
    @endslot
    @slot('modal_title')
        Cadastrar País de Origem
    @endslot
        <div class="form-group">
          <label>País: *</label>
          <input class="form-control" type="text" id="nome_pais" name="nome" autocomplete="off"/>

					<label>Fabricação: * (ex: brasileira/canadense...)</label>
					<input class="form-control" type="text" id="fabricacao" name="fabricacao" autocomplete="off"/>

          <p>* Obrigatório</p>
          <button type="button" class="btn btn-primary" id="cadastroPais">Cadastrar</button>
        </div>
@endcomponent