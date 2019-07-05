<div class="form-group">
		<label>Marca</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="marca_id" id="marca">
			@foreach ($marcas as $marca)
					<option value="{{ $marca->id }}">{{ $marca->nome }}
					</option>
			@endforeach
			<option value="outraMarca">Outro(cadastrar)</option>
		</select>
	@endif

	@if($acao == 'atualizar')
		<select class="form-control" name="marca_id">
			<option value="{{ $marca_id }} ">{{ $marca }}</option>
			@foreach ($marcas as $marca)
					@if($marca->id<>$marca_id )
						<option value="{{ $marca->id }}">{{ $marca->nome }}
						</option>
					@endif
			@endforeach
		</select>
	@endif
</div>
{{-- <div class="modal fade" id="marca-modal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cadastrar Marca</h4>
        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
      </div>
      <div class="modal-body">
        <p>Atenção! Antes de cadastrar, certifique-se que a escrita está certa.</p>
        <div class="form-group">
          <label>Marca: *</label>
          <input class="form-control" type="text" id="nome" name="nome" autocomplete="off"/>

					<label>Tipo: *</label>
					<select class="form-control" name="tipo" id="tipo">

                    <option value="Arma">Arma</option>
										<option value="Municao">Munição</option>

          </select>

          <p>* Obrigatório</p>
          <button type="submit" class="btn btn-primary" id="cadastroMarca">Cadastrar</button>
        </div>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-default" data-dismiss="modal">Fechar</a>
      </div>
    </div>
  </div>
</div> --}}
