<div class="col-lg-3">
	<div class="form-group">
		<label>Sistema de Funcionamento *</label>
		<select class="js-single form-control{{ $errors->has('sistema_funcionamento') ? ' is-invalid' : '' }}"
				name="sistema_funcionamento" id="sistema_funcionamento">
			@foreach (['Unitário', 'Repetição', 'Semi-automático', 'Automático'] as $sistema_funcionamento)
				<option value="{{ mb_strtolower($sistema_funcionamento)}}" {{ (mb_strtolower($sistema_funcionamento) == mb_strtolower($sistema_funcionamento2)) ? 'selected=selected' : '' }}>
					{{$sistema_funcionamento}}
				</option>
			@endforeach
		</select>
		@include('shared.error_feedback', ['name' => 'sistema_funcionamento'])
	</div>
</div>

