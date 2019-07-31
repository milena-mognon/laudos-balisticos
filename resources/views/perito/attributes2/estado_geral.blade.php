<div class="col-lg-3">
    <div class="form-group">
        <label>Estado Geral</label>
        <select class="form-control{{ $errors->has('estado_geral') ? ' is-invalid' : '' }}"
                name="estado_geral">
            @foreach (['Regular','Bom', 'Mau'] as $estado_geral)
                <option value="{{ mb_strtolower($estado_geral)}}"
                        {{ (mb_strtolower($estado_geral) == mb_strtolower($estado_geral2)) ? 'selected=selected' : '' }}>
                    {{$estado_geral}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'estado_geral'])
    </div>
</div>