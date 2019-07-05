<div class="modal fade" id="calibre-modal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cadastrar Calibre</h4>
        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
      </div>
      <div class="modal-body">
        <p>Atenção! Antes de cadastrar, certifique-se que a escrita está certa.</p>
        <div class="form-group">
          <label>Calibre: *</label>
          <input class="form-control" type="text" id="nome_calibre" name="calibre" autocomplete="off"/>

					<label>Tipo: *</label>
					<select class="form-control" name="tipo" id="tipo_calibre">

                    <option value="espingarda">Espingarda</option>
										<option value="pistola">Pistola</option>
										<option value="revolver">Revolver</option>

          </select>

          <p>* Obrigatório</p>
          <button type="submit" class="btn btn-primary" id="cadastroCalibre">Cadastrar</button>
        </div>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-default" data-dismiss="modal">Fechar</a>
      </div>
    </div>
  </div>
</div>
