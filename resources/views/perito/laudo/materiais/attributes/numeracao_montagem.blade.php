<div class="col-lg-3">
    <div class="form-group">
        <label>Numeração de Montagem</label>
        <input class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" name="modelo" autocomplete="off" type="text"
               value="{{ old('modelo', $modelo) }}"/>
        @include('shared.error_feedback', ['name' => 'modelo'])
    </div>
</div>
