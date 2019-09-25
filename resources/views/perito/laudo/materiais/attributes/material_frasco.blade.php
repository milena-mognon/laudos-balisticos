<div class="col-lg-3">
    <div class="form-group">
        <label>Material do(s) Fraco(s)</label>
        <select class="js-single form-control{{ $errors->has('material_frascos') ? ' is-invalid' : '' }}" name="material_frascos">
            @foreach (['Material Sintético', 'Metálico', 'Plástico'] as $material_frascos)
                <option value="{{ mb_strtolower($material_frascos)}}" {{ (mb_strtolower($material_frascos) == mb_strtolower($material_frascos2)) ? 'selected=selected' : '' }}>
                    {{$material_frascos}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'material_frascos'])
    </div>
</div>