<div class="col-lg-3">
    <div class="form-group">
        <label>Calibre Real</label>
        <button type="button" class="btn-cadastro float-right" id="calibre_real_help">
            <i class="fas fa-question" aria-hidden="true"></i>
        </button>
        <input class="form-control {{ $errors->has('calibre_real') ? ' is-invalid' : '' }}" name="calibre_real"
            autocomplete="off" id="calibre_real" value="{{ old('calibre_real', $calibre_real) }}" maxlength="40" />
        @include('shared.error_feedback', ['name' => 'calibre_real'])
    </div>
</div>