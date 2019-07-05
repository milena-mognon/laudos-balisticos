<div class="form-group">
		<label>Capacidade Carregador</label>
	@if ($acao == 'cadastrar')
			<input class="form-control" name="capacidade_carregador" type="number" required />
	@endif

	@if ($acao == 'atualizar')
			<input class="form-control" name="capacidade_carregador" type="number" value="{{ $capacidade_carregador }}" required/>
	@endif
</div>
