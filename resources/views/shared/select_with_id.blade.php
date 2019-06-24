<div class="col-lg-{{ $size ?? "8" }}">
    <select class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"
            name="{{ $name }}" id="{{ $id ?? $name }}">
        @foreach($dados as $dado)
            @if($dado->id == old($name) || $dado->id == $value)
                <option value="{{$dado->id}}" selected>{{$dado->nome}}</option>
            @else
                <option value="{{$dado->id}}">{{$dado->nome}}</option>
            @endif
            @includeWhen($option_create ?? false, 'perito.shared.option_other')
            @includeWhen($secao ?? false, 'perito.shared.auth_secao_option')

        @endforeach
    </select>
    @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
    @endif
</div>
