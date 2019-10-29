<div class="col-lg-3">
    <div class="form-group">
        <label for="calibre_id">Calibre Nominal {{ $obrigatorio ? '*' : '' }}</label>
        <select class="js-single-calibres form-control{{ $errors->has('calibre_id') ? ' is-invalid' : '' }}"
            name="calibre_id" id="calibre">
            <option></option>
            @foreach ($calibres as $calibre)
            <option value="{{ $calibre->id }}" {{ $calibre->id == $calibre2 ? 'selected=selected' : '' }}>
                {{$calibre->nome}}
            </option>
            @endforeach
            <option value="cadastrar_calibre">Cadastrar Outro</option>
        </select>
        @include('shared.error_feedback', ['name' => 'calibre_id'])
    </div>
</div>