<div class="col-lg-3">
    <div class="form-group">
        <label>Marca</label>
        <select class="form-control{{ $errors->has('marca_id') ? ' is-invalid' : '' }}" name="marca_id">
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}" {{ $marca->id == $marca2 ? 'selected=selected' : '' }}>
                    {{$marca->nome}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'marca_id'])
    </div>
</div>