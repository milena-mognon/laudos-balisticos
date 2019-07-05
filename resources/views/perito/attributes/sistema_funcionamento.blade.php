<div class="form-group">
	<label>Sistema de Funcionamento</label>
	@if($acao == 'cadastrar')
	<select class="form-control" name="sistema_funcionamento" id="sistema_funcionamento">
			@foreach (['Unitário', 'Repetição', 'Semi-automático', 'Automático'] as $sistema_funcionamento)
				<option id="{{ mb_strtolower($sistema_funcionamento) }}" value="{{ mb_strtolower($sistema_funcionamento) }}">{{ $sistema_funcionamento }}
				</option>
			@endforeach
		</select>
	<div class="form-group" id="tipo_carregador">
		<label>Tipo do Carregador</label>

		<select class="form-control" name="tipo_carregador">
			@foreach (['Tubular', 'Reto'] as $tipo_carregador)
				<option id="{{ mb_strtolower($tipo_carregador) }}" value="{{ mb_strtolower($tipo_carregador) }}">{{ $tipo_carregador }}
				</option>
			@endforeach
		</select>
	</div>
	<br>
	@endif
	@if($acao == 'atualizar')
	<select class="form-control" name="sistema_funcionamento">
			<option  id="{{ mb_strtolower($sistema_funcionamento) }}" value="{{ mb_strtolower($sistema_funcionamento) }}">{{ ucfirst ($sistema_funcionamento) }}
								{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Unitário', 'Repetição', 'Semi-automático', 'Automático'] as $tipo)
				@if ($sistema_funcionamento<>mb_strtolower($tipo))
					<option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
					</option>
				@endif
			@endforeach
		</select>
	<div class="form-group" id="tipo_carregador">
		<label>Tipo do Carregador</label>
		<select class="form-control" name="tipo_carregador">
      <option  id="{{ mb_strtolower($tipo_carregador) }}" value="{{ mb_strtolower($tipo_carregador) }}">{{ ucfirst ($tipo_carregador) }}
                {{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
      </option>
      @foreach (['Tubular Justaposto', 'Outro'] as $tipo)
        @if ($tipo_carregador<>mb_strtolower($tipo))
          <option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
          </option>
        @endif
      @endforeach
    </select>
	</div>
	@endif
</div>
