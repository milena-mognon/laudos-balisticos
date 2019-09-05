<div class="col-lg-3">
    <div class="form-group">
        <div class="row m-auto">
            <label>Calibre Real</label>
            <a class="btn btn-info btn-sm ml-2 text-white" id="calibre_real_help" style="height: 1.7em">
                <i class="fas fa-question mb-2"></i>
            </a>
        </div>
        <input class="form-control {{ $errors->has('calibre_real') ? ' is-invalid' : '' }}"
               name="calibre_real" autocomplete="off" id="calibre_real"
               value="{{ old('calibre_real', $calibre_real) }}" maxlength="40"/>
        @include('shared.error_feedback', ['name' => 'calibre_real'])
    </div>
</div>
