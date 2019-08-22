<div class="col-lg-{{ $size ?? "12" }} mt-2" id="tipo_arma">
    <label>Utilizado em:</label>
    <select class="js-single form-control{{ $errors->has('tipo_arma') ? ' is-invalid' : '' }}" name="tipo_arma">
        @foreach (['Espingarda', 'Pistola', 'Revólver'] as $tipo_arma)
            <option value="{{ mb_strtolower($tipo_arma)}}"
                    {{ (mb_strtolower($tipo_arma) == mb_strtolower($tipo_arma2)) ? 'selected=selected' : '' }}>
                {{$tipo_arma}}
            </option>
        @endforeach
    </select>
    @include('shared.error_feedback', ['name' => 'tipo_arma'])
</div>