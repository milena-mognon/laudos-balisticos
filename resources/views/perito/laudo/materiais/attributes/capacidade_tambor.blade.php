<div class="col-lg-3">
    <div class="form-group">
        <label>Capacidade do Tambor *</label>
        <input class="form-control {{ $errors->has('capacidade_tambor') ? ' is-invalid' : '' }}"
               name="capacidade_tambor" autocomplete="off" type="number"
               value="{{ old('capacidade_tambor', $capacidade_tambor) }}" min="0" required/>
        @include('shared.error_feedback', ['name' => 'capacidade_tambor'])
    </div>
</div>
