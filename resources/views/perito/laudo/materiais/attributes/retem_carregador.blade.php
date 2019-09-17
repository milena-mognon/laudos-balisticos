<div class="col-lg-3">
    <div class="form-group">
        <label>Retem do Carregador</label>
        <select class="js-single form-control{{ $errors->has('retem_carregador') ? ' is-invalid' : '' }}" name="retem_carregador">
            @foreach (['Ambidestro', 'Lado Direito', 'Lado Esquerdo'] as $retem_carregador)
                <option value="{{ mb_strtolower($retem_carregador)}}" {{ (mb_strtolower($retem_carregador) == mb_strtolower($retem_carregador2)) ? 'selected=selected' : '' }}>
                    {{$retem_carregador}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'retem_carregador'])
    </div>
</div>