<div class="col-lg-3">
    <div class="form-group">
        <label>Comprimento</label>
        <input class="form-control tamanho {{ $errors->has('comprimento_total') ? ' is-invalid' : '' }}"
               name="comprimento_total" placeholder="0,000 (metros)" autocomplete="off"
               value="{{ old('comprimento_total', $comprimento_total) }}" required/>
        @include('shared.error_feedback', ['name' => 'comprimento_total'])
    </div>
</div>
