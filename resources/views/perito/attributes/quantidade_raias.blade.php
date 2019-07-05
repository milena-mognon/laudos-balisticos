<div class="form-group">
	<label>Quantidade de Raias</label>
	@if($acao == 'cadastrar')
		<input class="form-control" name="quantidade_raias" type="number" required/>
	@endif

	@if($acao == 'atualizar')
		<input class="form-control" name="quantidade_raias" type="number" value="{{ $quant_raias }}" required/>
	@endif
</div>
