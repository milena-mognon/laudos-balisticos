<div class="form-group">
	<label>Sistema de Carregamento</label>
	@if($acao == 'cadastrar')
	<select class="form-control" name="sistema_carregamento" id="sistema_carregamento">
			@foreach (['Retro-carga', 'Antecarga'] as $sistema_carregamento)
				<option id="{{ mb_strtolower($sistema_carregamento) }}" value="{{ mb_strtolower($sistema_carregamento) }}">{{ $sistema_carregamento }}
				</option>
			@endforeach
		</select>
	@endif
	@if($acao == 'atualizar')
	<select class="form-control" name="sistema_carregamento" id="sistema_carregamento">
			<option  id="{{ mb_strtolower($sistema_carregamento) }}" value="{{ mb_strtolower($sistema_carregamento) }}">{{ ucfirst ($sistema_carregamento) }}
								{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Retro-carga', 'Antecarga'] as $tipo)
				@if ($sistema_carregamento<>mb_strtolower($tipo))
					<option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
