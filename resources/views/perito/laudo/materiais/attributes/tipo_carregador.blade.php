<div class="col-lg-3">
    <div class="form-group">
        <label>Tipo do Carregador *</label>
        <select class="js-single-select form-control{{ $errors->has('tipo_carregador') ? ' is-invalid' : '' }}"
                name="tipo_carregador" id="tipo_carregador">
            <option value=""></option>
            @foreach (['Tubular Justaposto', 'Outro'] as $tipo_carregador)
                <option value="{{ mb_strtolower($tipo_carregador)}}" {{ (mb_strtolower($tipo_carregador) == mb_strtolower($tipo_carregador2)) ? 'selected=selected' : '' }}>
                    {{$tipo_carregador}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'tipo_carregador'])
    </div>
</div>