<div class="form-group">
	<label>Observações Adicionais</label>
	@if ($acao == 'cadastrar')
		<input class="form-control" name="observacao" type="number" />
	@endif

	@if ($acao == 'atualizar')
		<input class="form-control" name="observacao" type="number" value="{{ $observacao }}" />
	@endif
</div>



