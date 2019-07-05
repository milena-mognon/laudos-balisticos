<div class="form-group">
		<label>Nº do Lacre</label>
	@if ($acao == 'cadastrar')
			<input class="form-control" name="num_lacre" type="number" required/>
	@endif

	@if ($acao == 'atualizar')
			<input class="form-control" name="num_lacre" type="number" value="{{ $lacre }}" required/>
	@endif
</div>
