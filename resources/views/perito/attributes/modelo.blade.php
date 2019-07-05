<div class="form-group">
		<label>Modelo</label>
	@if ($acao == 'cadastrar')
			<input class="form-control" type="text" name="modelo">
	@endif

	@if ($acao == 'atualizar')
			<input class="form-control" type="text" name="modelo" value="{{ $modelo }}">
	@endif
</div>
