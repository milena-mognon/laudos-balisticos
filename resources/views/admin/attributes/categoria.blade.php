<div class="col-lg-{{ $size ?? "8" }} mt-2" id="categoria">
    <label>Categoria</label>
    <select class="form-control{{ $errors->has('categoria') ? ' is-invalid' : '' }}" name="categoria">
        @foreach (['Arma', 'Munição'] as $categoria)
            <option value="{{ mb_strtolower($categoria)}}"
                    {{ (mb_strtolower($categoria) == mb_strtolower($categoria2)) ? 'selected=selected' : '' }}>
                {{$categoria}}
            </option>
        @endforeach
    </select>
    @include('shared.error_feedback', ['name' => 'categoria'])
</div>

