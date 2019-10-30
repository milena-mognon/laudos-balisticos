<div class="col-lg-3">
    <div class="form-group">
        <label>País de Origem *</label>
        <button type="button" class="btn-cadastro float-right" id="cadastrar_pais">
            <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
        </button>
        <select class="js-single-origens form-control{{ $errors->has('origem_id') ? ' is-invalid' : '' }}"
            name="origem_id" id="pais">
            <option></option>
            @foreach ($origens as $origem)
            <option value="{{ $origem->id }}" {{ $origem->id == $origem2 ? 'selected=selected' : '' }}>
                {{$origem->nome}}
            </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'origem_id'])
    </div>
</div>