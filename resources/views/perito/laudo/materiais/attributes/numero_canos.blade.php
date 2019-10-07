<div class="col-lg-3">
    <div class="form-group">
        <label>Número de Canos *</label>
        <select class="js-single form-control{{ $errors->has('num_canos') ? ' is-invalid' : '' }}"
                name="num_canos" id="num_canos">
            @foreach (['Um', 'Dois'] as $num_canos)
                <option value="{{ mb_strtolower($num_canos)}}" {{ (mb_strtolower($num_canos) == mb_strtolower($num_canos2)) ? 'selected=selected' : '' }}>
                    {{$num_canos}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'num_canos'])
    </div>
</div>

