<div class="col-lg-3">
    <div class="form-group">
        <label>Quantidade de Frascos</label>
        <input class="form-control {{ $errors->has('quantidade_frascos') ? ' is-invalid' : '' }}"
               name="quantidade_frascos" autocomplete="off" type="number"
               value="{{ old('quantidade_frascos', $quantidade_frascos) }}" min="0" required/>
        @include('shared.error_feedback', ['name' => 'quantidade_frascos'])
    </div>
</div>
