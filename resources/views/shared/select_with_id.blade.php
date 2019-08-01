<div class="col-lg-{{ $size ?? "8" }}">
    @if(!empty($label))
        <label for="{{ $name }}" class="col-form-label">{{ $label ?? ''}}</label>
    @endif

    <select class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"
            name="{{ $name }}" id="{{ $id ?? $name }}">
        @foreach($dados as $dado)
            @if($dado->id == old($name) || $dado->id == $value)
                <option value="{{$dado->id}}" selected>{{$dado->nome}}</option>
            @else
                <option value="{{$dado->id}}">{{$dado->nome}}</option>
            @endif
            @includeWhen($option_create ?? false, 'perito.shared.option_other')
        @endforeach
    </select>
    @include('shared.error_feedback', ['name' => $name])
</div>
