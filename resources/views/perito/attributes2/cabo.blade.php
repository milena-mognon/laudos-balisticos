<div class="col-lg-3">
    <div class="form-group">
        <label>Cabo</label>
        <select class="form-control{{ $errors->has('cabo') ? ' is-invalid' : '' }}" name="cabo">
            @foreach (['Madeira', 'Material Sintético', 'Madrepérola', 'Desprovido'] as $cabo)
                <option value="{{ mb_strtolower($cabo)}}" {{ (mb_strtolower($cabo) == mb_strtolower($cabo2)) ? 'selected=selected' : '' }}>
                    {{$cabo}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'cabo'])
    </div>
</div>