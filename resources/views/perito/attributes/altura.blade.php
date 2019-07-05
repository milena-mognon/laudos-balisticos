<div class="form-group">
	<label>Altura</label>
	@if($acao == 'cadastrar')
		<input class="form-control" id="input1" name="altura" placeholder="0,000 (metros)" required/>
	@endif
	@if($acao == 'atualizar')
		<input class="form-control" id="input1" name="altura" placeholder="0,000 (metros)" value="{{ $altura }}" required />
	@endif
</div>
