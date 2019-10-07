<div class="col-lg-3">
    <div class="form-group">
        <label>Comprimento do Cano *</label>
        <input class="form-control tamanho{{ $errors->has('comprimento_cano') ? ' is-invalid' : '' }}" name="comprimento_cano"
               placeholder="0,000 (metros)" autocomplete="off"
               value="{{ old('comprimento_cano', $comprimento_cano) }}" required/>
        @include('shared.error_feedback', ['name' => 'comprimento_cano'])
    </div>
</div>
