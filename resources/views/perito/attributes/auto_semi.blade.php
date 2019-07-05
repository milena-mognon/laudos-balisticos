<div class="form-group">
	<label>Funcionamento</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="func_tiro">
			@foreach (['Semi-automática', 'Automática'] as $funcionamento)
				<option value="{{ mb_strtolower($funcionamento) }}">{{ $funcionamento }}</option>
			@endforeach
		</select>
	@endif
	@if($acao == 'atualizar')
		<select class="form-control" name="func_tiro">
			<option value="{{ mb_strtolower($funcionamento) }}">{{ ucfirst ($funcionamento) }}
				{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Semi-automática', 'Automática'] as $funcionamento2)
				@if ($funcionamento<>mb_strtolower($funcionamento2))
					<option value="{{ mb_strtolower($funcionamento2) }}">{{ $funcionamento2 }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
