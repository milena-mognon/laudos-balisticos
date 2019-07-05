<div class="form-group" id="sentido_raias">
    <label>Sentido Raias</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="sentido_raias" id="sentido_raias">
				<option value="dextrógiras">Dextrógiro
				</option>
        <option value="sinistrógeras">Sinistrógero
				</option>
        <option value="danificado">Danificado
				</option>
		</select>
	@endif
	@if($acao == 'atualizar')
		<select class="form-control" name="sentido_raias" id="sentido_raias">
			@if ($sentido_raias=='dextrógiras')
        <option value="dextrógiras">Dextrógiro
				</option>
        <option value="sinistrógeras">Sinistrógero
				</option>
        <option value="danificado">Danificado
				</option>
      @endif
      @if ($sentido_raias=='sinistrógiras')
        <option value="sinistrógeras">Sinistrógero
				</option>
        <option value="Dextrógiras">Dextrógiro
				</option>
        <option value="danificado">Danificado
				</option>
      @endif
      @if ($sentido_raias=='danificadas')
        <option value="danificado">Danificado
				</option>
        <option value="sinistrógeras">Sinistrógero
				</option>
        <option value="Dextrógiras">Dextrógiro
				</option>
      @endif

		</select>
	@endif
</div>
