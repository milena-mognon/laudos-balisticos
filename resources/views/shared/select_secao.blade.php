<div class="col-lg-{{ $size ?? "8" }}">
    <select class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"
            name="{{ $name }}" id="{{ $id ?? $name }}">
        @foreach($secoes as $secao)
            @if($secao->id == old($name))
                <option value="{{$secao->id}}" selected>{{$secao->nome}}</option>
            @else
                @if(Auth::user()->secao_id == $secao->id)
                    <option value="{{$secao->id}}" selected>{{$secao->nome}}</option>
                @else
                    <option value="{{$secao->id}}">{{$secao->nome}}</option>
                @endif
            @endif
        @endforeach
    </select>
    @include('shared.error_feedback', ['name' => $name])
</div>
