<div class="form-group">
		<label>Tambor Rebate para:</label>
@if($acao == 'cadastrar')
			<select class="form-control" name="tambor_rebate">
				@foreach (['Esquerda', 'Direita'] as $tambor_rebate2)
						<option value="{{ mb_strtolower($tambor_rebate2) }}">{{ $tambor_rebate2 }}
						</option>
				@endforeach
			</select>
@endif

@if($acao == 'atualizar')
		<select class="form-control" name="tambor_rebate">
			<option value="{{ mb_strtolower($tambor_rebate) }}">{{ ucfirst ($tambor_rebate) }}
					{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Esquerda', 'Direita'] as $tambor_rebate2)
				@if ($tambor_rebate<>mb_strtolower($tambor_rebate2))
					<option value="{{ mb_strtolower($tambor_rebate2) }}">{{ $tambor_rebate2 }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
