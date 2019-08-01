<div class="col-lg-{{ $size ?? "8" }} mt-2">
    <label for="cargo_id">Cargo</label>
    <select class="form-control {{ $errors->has('cargo_id') ? ' is-invalid' : '' }}"
            name="cargo_id">
        @foreach($cargos as $cargo)
            <option value="{{ $cargo->id }}" {{ $cargo->id == $cargo2 ? 'selected=selected' : '' }}>
                {{$cargo->nome}}
            </option>
        @endforeach
    </select>
    @include('shared.error_feedback', ['name' => 'cargo_id'])
</div>
