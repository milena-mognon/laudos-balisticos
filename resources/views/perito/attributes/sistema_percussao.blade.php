<div class="form-group">
	<label>Sistema de Percussão</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="sistema_percussao">
			@foreach (['Direta', 'Indireta'] as $percussao)
				<option value="{{ mb_strtolower($percussao) }}">{{ $percussao }}
				</option>
			@endforeach
		</select>
	@endif

	@if($acao == 'atualizar')
		<select class="form-control" name="sistema_percussao">
			<option  id="{{ mb_strtolower($percussao) }}" value="{{ mb_strtolower($percussao) }}">{{ ucfirst ($percussao) }}
									{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Direta', 'Indireta'] as $tipo)
				@if ($percutor<>mb_strtolower($tipo))
					<option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
