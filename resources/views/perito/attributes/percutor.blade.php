<div class="form-group">
	<label>Sistema de Percussão</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="percutor">
			@foreach (['Direta', 'Indireta'] as $percutor)
				<option value="{{ mb_strtolower($percutor) }}">{{ $percutor }}
				</option>
			@endforeach
		</select>
	@endif

	@if($acao == 'atualizar')
		<select class="form-control" name="percutor">
			<option  id="{{ mb_strtolower($percutor) }}" value="{{ mb_strtolower($percutor) }}">{{ ucfirst ($percutor) }} 
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
