<div class="col-lg-3 mt-2">
    <label for="tipo_inquerito">Tipo do Inquerito</label>
    <select class="js-single form-control {{ $errors->has('tipo_inquerito') ? ' is-invalid' : '' }}"
            name="tipo_inquerito">
        @foreach(['BO', 'Inquerito Policial', 'Inquerito Policial Flagrante Delito'] as $tipo_inquerito)
            <option value="{{ $tipo_inquerito }}" {{ $tipo_inquerito == $tipo_inquerito2 ? 'selected=selected' : '' }}>
                {{$tipo_inquerito}}
            </option>
        @endforeach
    </select>
    @include('shared.error_feedback', ['name' => 'tipo_inquerito'])
</div>
