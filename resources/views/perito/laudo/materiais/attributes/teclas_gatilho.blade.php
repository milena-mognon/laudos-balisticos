<div class="col-lg-3">
    <div class="form-group">
        <label>Teclas de Gatilho *</label>
        <select class="js-single-select form-control{{ $errors->has('teclas_gatilho') ? ' is-invalid' : '' }}"
                name="teclas_gatilho" id="teclas_gatilho">
            <option value=""></option>
            @foreach (['Uma', 'Duas'] as $teclas_gatilho)
                <option value="{{ mb_strtolower($teclas_gatilho)}}" {{ (mb_strtolower($teclas_gatilho) == mb_strtolower($teclas_gatilho2)) ? 'selected=selected' : '' }}>
                    {{$teclas_gatilho}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'teclas_gatilho'])
    </div>
</div>