<div class="col-lg-3">
    <div class="form-group">
        <label>Estado Geral</label>
        <select class="form-control" name="estado_geral">
            @foreach (['Regular','Bom', 'Mau'] as $estado_geral)
                <option value="{{ mb_strtolower($estado_geral)}}" {{ (mb_strtolower($estado_geral) == mb_strtolower($estado_geral2)) ? 'selected=selected' : '' }}>
                    {{$estado_geral}}
                </option>
            @endforeach
        </select>
    </div>
</div>