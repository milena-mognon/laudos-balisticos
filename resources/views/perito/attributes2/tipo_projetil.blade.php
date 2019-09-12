<div class="col-lg-3">
    <div class="form-group">
        <label>Projétil (tipo)</label>
        <select class="js-single-select form-control{{ $errors->has('tipo_projetil') ? ' is-invalid' : '' }}"
                name="tipo_projetil" id="tipo_projetil">
            <option value=""></option>
            @foreach (['Encamisado', 'Semi-encamisado', 'Chumbo nu'] as $tipo_projetil)
                <option value="{{ mb_strtolower($tipo_projetil)}}" {{ (mb_strtolower($tipo_projetil) == mb_strtolower($tipo_projetil2)) ? 'selected=selected' : '' }}>
                    {{$tipo_projetil}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'tipo_projetil'])
    </div>
</div>