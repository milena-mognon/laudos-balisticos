<div class="col-lg-3">
	<div class="form-group">
		<label>Sistema de Engatilhamento</label>
		<select class="js-single form-control{{ $errors->has('sistema_engatilhamento') ? ' is-invalid' : '' }}" name="sistema_engatilhamento">
			@foreach (['Manual','Mecanismos Embutidos', 'Telha Corrediça'] as $sistema_engatilhamento)
				<option value="{{ mb_strtolower($sistema_engatilhamento)}}" {{ (mb_strtolower($sistema_engatilhamento) == mb_strtolower($sistema_engatilhamento2)) ? 'selected=selected' : '' }}>
					{{$sistema_engatilhamento}}
				</option>
			@endforeach
		</select>
		@include('shared.error_feedback', ['name' => 'sistema_engatilhamento'])
	</div>
</div>
