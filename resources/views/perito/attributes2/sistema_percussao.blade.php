<div class="col-lg-3">
    <div class="form-group">
        <label>Sistema de Percussão</label>
        <select class="js-single form-control{{ $errors->has('sistema_percussao') ? ' is-invalid' : '' }}"
                name="sistema_percussao">
            @foreach (['Direta', 'Indireta'] as $sistema_percussao)
                <option value="{{ mb_strtolower($sistema_percussao)}}" {{ (mb_strtolower($sistema_percussao) == mb_strtolower($sistema_percussao2)) ? 'selected=selected' : '' }}>
                    {{$sistema_percussao}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'sistema_percussao'])
    </div>
</div>
