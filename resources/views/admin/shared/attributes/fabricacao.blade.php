<div class="col-lg-{{ $size ?? "12" }} mt-2">
    <label for="fabricacao">Fabricacao *</label>
    <input class="form-control{{ $errors->has('fabricacao') ? ' is-invalid' : '' }}" name="fabricacao"
        autocomplete="off" type="text" value="{{ old('fabricacao', $fabricacao) }}" required />
    @include('shared.error_feedback', ['name' => 'fabricacao'])
</div>