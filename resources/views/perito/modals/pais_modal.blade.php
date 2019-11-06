@component('layout.modal')
@slot('modal_id')
pais-modal
@endslot
@slot('modal_title')
Cadastrar País de Origem
@endslot
@slot('modal_size')
md
@endslot
<hr>

<div class="form-group">
  <div class="col-lg-12">
    <label>País: *</label>
    <input class="form-control mb-2" type="text" id="nome_pais" name="nome" autocomplete="off" />

    <label>Fabricação: * (ex: brasileira/canadense...)</label>
    <input class="form-control mb-2" type="text" id="fabricacao" name="fabricacao" autocomplete="off" />

    <p class="obrigatorio mt-2">* Obrigatório</p>
    <div class="row justify-content-between">
      <div class="col-lg-6 mb-2">
        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">
          <i class="fas fa-times"></i> Fechar</button>
      </div>
      <div class="col-lg-6 mb-2">
        <button type="button" class="btn btn-success btn-block" id="cadastroPais">
          <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar</button>

      </div>
    </div>
  </div>
</div>
@endcomponent