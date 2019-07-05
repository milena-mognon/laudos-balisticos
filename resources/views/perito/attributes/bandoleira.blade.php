<div class="form-group">
	<label>Bandoleira</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="tem_bandoleira">
			@foreach (['Não', 'Sim'] as $bandoleira)
				<option value="{{ strtolower($bandoleira) }}">{{ $bandoleira }}</option>
			@endforeach
		</select>
		<input class="form-control" type="text" name="bandoleira" id="mostrarBand" placeholder="Descrição">
	@endif
	@if($aacao == 'atualizar')
		<select class="form-control" name="tem_bandoleira">
			<option value="{{ strtolower($bandoleira) }}">{{ ucfirst ($bandoleira) }}
				{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Não', 'Sim'] as $bandoleira2)
				@if ($bandoleira<>strtolower($bandoleira2))
					<option value="{{ strtolower($bandoleira2) }}">{{ $bandoleira2 }}
					</option>
				@endif
			@endforeach
		</select>
		<input class="form-control" type="text" name="bandoleira" id="mostrarBand" placeholder="Descrição">
	@endif
</div>
