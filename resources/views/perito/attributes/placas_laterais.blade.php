<div class="form-group">
		<label>Placas Laterais (material)</label>
@if($acao == 'cadastrar')
			<select class="form-control" name="placas_laterais">
				@foreach (['Sintético', '...'] as $placas_laterais2)
						<option value="{{ mb_strtolower($placas_laterais2) }}">{{ $placas_laterais2 }}
						</option>
				@endforeach
			</select>
@endif

@if($acao == 'atualizar')
		<select class="form-control" name="placas_laterais">
			<option value="{{ mb_strtolower($placas_laterais) }}">{{ ucfirst ($placas_laterais) }}
					{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Sintético', '...'] as $placas_laterais2)
				@if ($placas_laterais<>mb_strtolower($placas_laterais2))
					<option value="{{ mb_strtolower($placas_laterais2) }}">{{ $placas_laterais2 }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
