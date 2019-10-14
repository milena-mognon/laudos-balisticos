<div class="col-lg-3">
    <div class="form-group">
        <label>Marca *</label>
        <select class="js-single-marcas form-control{{ $errors->has('marca_id') ? ' is-invalid' : '' }}"
                name="marca_id" id="marca_id">
            <option></option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}" {{ $marca->id == $marca2 ? 'selected=selected' : '' }}>
                    {{$marca->nome}}
                </option>
            @endforeach
            <option value="cadastrar_marca">Cadastrar Outra</option>
        </select>
        @include('shared.error_feedback', ['name' => 'marca_id'])
    </div>
</div>
@include('perito.modals.marca_modal')