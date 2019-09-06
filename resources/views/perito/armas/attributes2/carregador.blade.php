<div class="col-lg-3">
    <div class="form-group">
        <label>Carregador</label>
        <select class="js-single form-control{{ $errors->has('carregador') ? ' is-invalid' : '' }}" name="carregador">
            @foreach (['Monofilar', 'Bifilar'] as $carregador)
                <option value="{{ mb_strtolower($carregador)}}" {{ (mb_strtolower($carregador) == mb_strtolower($carregador2)) ? 'selected=selected' : '' }}>
                    {{$carregador}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'carregador'])
    </div>
</div>