<div class="col-md-8">
    <select class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"
    name="{{ $name }}" id="{{ $id }}">
        @foreach($dados as $dado)
            @if($dado == old($name) || $dado == $value)
                <option value="{{$dado}}" selected>{{$dado}}</option>
            @else
                <option value="{{$dado}}">{{$dado}}</option>
            @endif
        @endforeach
    </select>
    @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>