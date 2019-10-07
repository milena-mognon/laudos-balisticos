<div class="col-lg-3">
    <div class="form-group">
        <label>Tipo de Acabamento *</label>
        <select class="js-single form-control{{ $errors->has('tipo_acabamento') ? ' is-invalid' : '' }}"
                name="tipo_acabamento">
            @foreach (['Desprovido', 'Cromado', 'Emborrachado', 'Niquelado', 'Oxidado'] as $acabamento)
                <option value="{{ mb_strtolower($acabamento)}}" {{ (mb_strtolower($acabamento) == mb_strtolower($tipo_acabamento2)) ? 'selected=selected' : '' }}>
                    {{$acabamento}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'tipo_acabamento'])
    </div>
</div>
