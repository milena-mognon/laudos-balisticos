<div class="col-lg-3">
    <div class="form-group">
        <label for="calibre_id">Calibre Nominal {{ $obrigatorio ? '*' : '' }}</label>
        <button type="button" class="btn-cadastro float-right" id="cadastrar_calibre">
            <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
        </button>
        <select class="js-single-calibres form-control{{ $errors->has('calibre_id') ? ' is-invalid' : '' }}"
            name="calibre_id" id="calibre">
            <option></option>
            @foreach ($calibres as $calibre)
            <option value="{{ $calibre->id }}" {{ $calibre->id == $calibre2 ? 'selected=selected' : '' }}>
                {{$calibre->nome}}
            </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'calibre_id'])
    </div>
</div>