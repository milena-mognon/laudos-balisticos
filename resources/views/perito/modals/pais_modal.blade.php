<div class="modal fade" id="pais-modal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cadastrar País</h4>
        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
      </div>
      <div class="modal-body">
        <p>Atenção! Antes de cadastrar, certifique-se que a escrita está certa.</p>
        <div class="form-group">
          <label>País: *</label>
          <input class="form-control" type="text" id="nome_pais" name="nome" autocomplete="off"/>

					<label>Fabricação: * (ex: brasileira/canadense...)</label>
					<input class="form-control" type="text" id="fabricacao" name="fabricacao" autocomplete="off"/>

          <p>* Obrigatório</p>
          <button type="submit" class="btn btn-primary" id="cadastroPais">Cadastrar</button>
        </div>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-default" data-dismiss="modal">Fechar</a>
      </div>
    </div>
  </div>
</div>
