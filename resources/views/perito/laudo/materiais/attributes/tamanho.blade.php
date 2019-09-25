<div class="col-lg-3">
    <div class="form-group">
        <label>Tamanho (mm)</label>
        <input class="form-control {{ $errors->has('tamanho') ? ' is-invalid' : '' }}"
               name="tamanho" autocomplete="off" type="number"
               value="{{ old('tamanho', $tamanho) }}" min="0" required/>
        @include('shared.error_feedback', ['name' => 'tamanho'])
    </div>
</div>
