<div class="form-group">
	@if($tipo == 'polvora' || $tipo == 'balins de chumbo')
	<label>Quantidade (gramas)</label>
	@elseif ($tipo == 'espoletas')
	<label>Quantidade (unidades)</label>
	@else
	<label>Quantidade</label>
	@endif
	@if($acao == 'cadastrar')
	<input class="form-control" name="quantidade" type="number" required>
	@endif

	@if($acao == 'atualizar')
	<input class="form-control" name="quantidade" type="number" value="{{ $quantidade }}" required>
	@endif
</div>
