<div class="col-lg-3">
    <div class="form-group">
        <label>País de Origem *</label>
        <select class="js-single-origens form-control{{ $errors->has('origem_id') ? ' is-invalid' : '' }}"
                name="origem_id" id="pais">
            <option></option>
            @foreach ($origens as $origem)
                <option value="{{ $origem->id }}" {{ $origem->id == $origem2 ? 'selected=selected' : '' }}>
                    {{$origem->nome}}
                </option>
            @endforeach
            <option value="cadastrar_pais">Cadastrar Outro</option>
        </select>
        @include('shared.error_feedback', ['name' => 'origem_id'])
    </div>
</div>
@include('perito.modals.pais_modal')