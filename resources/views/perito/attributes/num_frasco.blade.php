<div class="form-group">
	<label>Quantidade de Frascos</label>
	@if($acao == 'cadastrar')
		<input class="form-control" name="num_frascos" type="number" min="1" step="any" required/>
	@endif
	@if($acao == 'atualizar')
		<input class="form-control" name="num_frascos" type="number" min="1" step="any" value="{{ $num_frascos }}" required />
	@endif
</div>
