<div class="col-md-8">
    <select class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"
    name="{{ $name }}" id="{{ $id }}">
        @foreach($dados as $dado)
            @if($dado->id == old($name) || $dado->id == $value)
                <option value="{{$dado->id}}" selected>{{$dado->nome}}</option>
            @else
                <option value="{{$dado->id}}">{{$dado->nome}}</option>
            @endif
        @endforeach
    </select>
    @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>