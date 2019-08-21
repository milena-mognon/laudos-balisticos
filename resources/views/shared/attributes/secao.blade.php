<div class="col-lg-{{ $size ?? "4" }} mt-2">
    <label for="secao_id">Seção</label>
    <select class="js-single-secoes form-control {{ $errors->has('secao_id') ? ' is-invalid' : '' }}"
            name="secao_id" id="secao_id">
        @foreach($secoes as $secao)
            @if($secao->id == old('secao_id'))
                <option value="{{$secao->id}}" selected>{{$secao->nome}}</option>
            @else
                @if(Auth::user()->secao->id == $secao->id)
                    <option value="{{$secao->id}}" selected>{{$secao->nome}}</option>
                @else
                    <option value="{{$secao->id}}">{{$secao->nome}}</option>
                @endif
            @endif
        @endforeach
    </select>
    @include('shared.error_feedback', ['name' => 'secao_id'])
</div>
