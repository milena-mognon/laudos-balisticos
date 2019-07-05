<div class="form-group">
	<label>Material do Frasco</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="material_frasco">
			@foreach (['Material Sintético', 'Metálico', 'Plástico'] as $material_frasco)
				<option value="{{ mb_strtolower($material_frasco) }}">{{ $material_frasco }}</option>
			@endforeach
		</select>
	@endif
	@if($acao == 'atualizar')
		<select class="form-control" name="material_frasco">
			<option value="{{ mb_strtolower($material_frasco) }}">{{ ucfirst ($material_frasco) }}
				{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Material Sintético', 'Metálico', 'Plástico'] as $material_frasco2)
				@if ($material_frasco<>mb_strtolower($material_frasco2))
					<option value="{{ mb_strtolower($material_frasco2) }}">{{ $material_frasco2 }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
