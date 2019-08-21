<div class="col-lg-{{ $size ?? "4" }} mt-2">
    <label for="diretor_id">Diretor</label>
    <select class="js-single-diretores form-control {{ $errors->has('diretor_id') ? ' is-invalid' : '' }}"
            name="diretor_id" id="diretor_id">
        @foreach($diretores as $diretor)
            <option value="{{ $diretor->id }}" {{ $diretor->id == $diretor2 ? 'selected=selected' : '' }}>
                {{$diretor->nome}}
            </option>
        @endforeach
    </select>
    @include('shared.error_feedback', ['name' => 'diretor_id'])
</div>
