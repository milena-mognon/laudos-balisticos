<div class="col-lg-{{ $size ?? "8" }} mt-2">
    <label for="{{$name}}">{{$label}}</label>
    <input class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}"
           name="{{$name}}" autocomplete="off" type="text" required/>
    @include('shared.error_feedback', ['name' => $name])
</div>