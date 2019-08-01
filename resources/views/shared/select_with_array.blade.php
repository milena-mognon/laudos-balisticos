<div class="col-lg-{{ $size ?? "8" }}">
    <select class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"
    name="{{ $name }}" id="{{ $id ?? $name}}">
        @foreach($dados as $dado)
            @if($dado == old($name) || $dado == $value)
                <option value="{{mb_strtolower($dado)}}" selected>{{$dado}}</option>
            @else
                <option value="{{mb_strtolower($dado)}}">{{$dado}}</option>
            @endif
        @endforeach
    </select>
    @include('shared.error_feedback', ['name' => $name])
</div>