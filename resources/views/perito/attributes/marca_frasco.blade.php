<div class="form-group">
		<label>Marca do Frasco (Opcional)</label>
	@if ($acao == 'cadastrar')
			<input class="form-control" name="marca_frasco" type="text">
	@endif

	@if ($acao == 'atualizar')
			<input class="form-control" name="marca_frasco" type="text" value="{{ $marca_frasco }}">
	@endif
</div>
