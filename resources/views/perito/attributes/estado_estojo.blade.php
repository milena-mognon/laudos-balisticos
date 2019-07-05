<div class="form-group">
	<label>Estado</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="estado">
			@foreach (['Percutido e Deflagrado', 'Percutido e Não Deflagrado', 'Desprovido de Espoleta'] as $estado)
				<option value="{{ strtolower($estado) }}">{{ $estado }}</option>
			@endforeach
		</select>
	@endif
	@if($acao == 'atualizar')
		<select class="form-control" name="estado">
			<option value="{{ strtolower($estado) }}">{{ ucfirst ($estado) }}
				{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Percutido e Deflagrado', 'Percutido e Não Deflagrado', 'Desprovido de Espoleta'] as $estado2)
				@if ($estado<>strtolower($estado2))
					<option value="{{ strtolower($estado2) }}">{{ $estado2 }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
