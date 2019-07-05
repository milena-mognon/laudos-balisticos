<div class="form-group">
	<label>Capacidade do Tambor</label>
	@if($acao == 'cadastrar')
			<input class="form-control" name="capacidade_tambor" type="number" required/>
	@endif

	@if($acao == 'atualizar')
			<input class="form-control" name="capacidade_tambor" type="number" value="{{ $capacidade_tambor }}" required />
	@endif
</div>
