<div class="col-lg-3">
    <div class="form-group">
        <label>Chave de Abertura</label>
        <select class="js-single-select form-control{{ $errors->has('chave_abertura') ? ' is-invalid' : '' }}"
                name="chave_abertura" id="chave_abertura">
            <option id="sem_valor" value=""></option>
            @foreach (['Região Superior ao Delgado', 'Região Anterior ao Guarda-Mato', 'Guarda-Mato', 'Lateral Esquerda', 'Lateral Direita'] as $chave_abertura)
                <option value="{{ mb_strtolower($chave_abertura)}}" {{ (mb_strtolower($chave_abertura) == mb_strtolower($chave_abertura2)) ? 'selected=selected' : '' }}>
                    {{$chave_abertura}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'chave_abertura'])
    </div>
</div>
