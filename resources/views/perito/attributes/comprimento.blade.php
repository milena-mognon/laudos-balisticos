<div class="form-group">
		<label>Comprimento</label>
	@if($acao == 'cadastrar')
			<input class="form-control" id="input3" name="comprimento_total"
				   placeholder="0,000 (metros)" autocomplete="off" required/>
	@endif

	@if($acao == 'atualizar')
			<input class="form-control" id="input3" name="comprimento_total"
				   placeholder="0,000 (metros)" value="{{ $comprimento }}" autocomplete="off" required />
	@endif
</div>
