<div class="col-lg-3">
    <div class="form-group">
        <label>Nº do Lacre *</label>
        <input class="form-control{{ $errors->has('num_lacre') ? ' is-invalid' : '' }}"
               name="num_lacre" autocomplete="off" type="number"
               value="{{ old('num_lacre', $num_lacre) }}" required/>
        @include('shared.error_feedback', ['name' => 'lacre'])
    </div>
</div>
