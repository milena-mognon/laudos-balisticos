<div class="col-lg-3">
    <div class="form-group">
        <label>Carregamento *</label>
        <select class="js-single form-control{{ $errors->has('carregamento') ? ' is-invalid' : '' }}"
            name="carregamento">
            @foreach (['Automática', 'Semi-automática'] as $carregamento)
            <option value="{{ mb_strtolower($carregamento)}}"
                {{ (mb_strtolower($carregamento) == mb_strtolower($carregamento2)) ? 'selected=selected' : '' }}>
                {{$carregamento}}
            </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'carregamento'])
    </div>
</div>