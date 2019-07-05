<div class="form-group">
	<label>Cabo</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="cabo">
			@foreach (['Curvo', 'Reto'] as $cabo)
				<option value="{{ mb_strtolower($cabo) }}">{{ $cabo }}</option>
			@endforeach
		</select>
	@endif
	@if($acao == 'atualizar')
		<select class="form-control" name="cabo">
			<option value="{{ mb_strtolower($cabo) }}">{{ ucfirst ($cabo) }}
				{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Curvo', 'Reto'] as $cabo2)
				@if ($cabo<>mb_strtolower($cabo2))
					<option value="{{ mb_strtolower($cabo2) }}">{{ $cabo2 }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
