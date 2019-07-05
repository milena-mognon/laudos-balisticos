<div class="form-group">
		<label>Sistema de Engatilhamento</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="sistema_engatilhamento">
			@foreach (['Manual','Mecanismos Embutidos', 'Telha Corrediça'] as $sistema_engatilhamento)
				<option id="{{ mb_strtolower($sistema_engatilhamento) }}" value="{{ mb_strtolower($sistema_engatilhamento) }}">{{ $sistema_engatilhamento }}
				</option>
			@endforeach
		</select>
	@endif

	@if($acao == 'atualizar')
		<select class="form-control" name="sistema_engatilhamento">
			<option  id="{{ mb_strtolower($sistema_engatilhamento) }}" value="{{ mb_strtolower($sistema_engatilhamento) }}">{{ ucfirst ($sistema_engatilhamento) }}
								{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Manual','Mecanismos Embutidos', 'Telha Corrediça'] as $tipo)
				@if ($sistema_engatilhamento<>mb_strtolower($tipo))
					<option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
