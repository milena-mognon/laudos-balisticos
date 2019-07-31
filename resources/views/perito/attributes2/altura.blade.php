<div class="col-lg-3">
    <div class="form-group">
        <label>Altura</label>
        <input class="form-control tamanho {{ $errors->has('altura') ? ' is-invalid' : '' }}"
               name="altura" placeholder="0,000 (metros)" autocomplete="off"
               value="{{ old('altura', $altura) }}" required/>
        @include('shared.error_feedback', ['name' => 'altura'])
    </div>
</div>
