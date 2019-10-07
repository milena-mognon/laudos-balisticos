<div class="col-lg-3">
    <div class="form-group">
        <label>Quantidade *</label>
        <input class="form-control {{ $errors->has('quantidade') ? ' is-invalid' : '' }}"
               name="quantidade" autocomplete="off" type="number"
               value="{{ old('quantidade', $quantidade) }}" min="0" required/>
        @include('shared.error_feedback', ['name' => 'quantidade'])
    </div>
</div>
