<div class="col-lg-3">
    <div class="form-group">
        @if($componente!=='Espoletas')
            <label>Quantidade (Gramas)</label>
            <input class="form-control quantidade {{ $errors->has('quantidade') ? ' is-invalid' : '' }}"
                   name="quantidade" autocomplete="off"
                   value="{{ old('quantidade', $quantidade) }}" min="0" required/>
        @else
            <label>Quantidade (Unidades)</label>
            <input class="form-control {{ $errors->has('quantidade') ? ' is-invalid' : '' }}"
                   name="quantidade" autocomplete="off" type="number"
                   value="{{ old('quantidade', $quantidade) }}" min="0" required/>
        @endif
        @include('shared.error_feedback', ['name' => 'quantidade'])
    </div>
</div>
