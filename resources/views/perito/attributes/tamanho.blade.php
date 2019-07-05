<div class="form-group" id="tamanho">
	<label>Tamanho (mm)</label>
	@if($acao == 'cadastrar')
		<input class="form-control" name="tamanho" type="text">
	@endif

	@if($acao == 'atualizar')
		<input class="form-control" name="tamanho" type="text" value="{{ $tamanho }}">
	@endif
</div>
