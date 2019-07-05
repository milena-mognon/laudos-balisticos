<div class="form-group">
	<label>Percutor (opcional)</label>
	<label for="percutor">Habilitar?</label>
	<input type="checkbox" id="habilitar-percutor"/>
	@if($acao == 'cadastrar')
		<select class="form-control" name="percutor" id="percutor">
			@foreach (['Intrínseco', 'Extrínseco'] as $percutor)
				<option value="{{ mb_strtolower($percutor) }}">{{ $percutor }}
				</option>
			@endforeach
		</select>
	@endif

	@if($acao == 'atualizar')
		<select class="form-control" name="percutor" id="percutor">
			<option  id="{{ mb_strtolower($percutor) }}" value="{{ mb_strtolower($percutor) }}">{{ ucfirst ($percutor) }}
									{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Intrínseco', 'Extrínseco'] as $tipo)
				@if ($percutor<>mb_strtolower($tipo))
					<option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
