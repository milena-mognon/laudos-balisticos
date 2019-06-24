@if(Auth::user()->secao_id == $secao->id)
    <option value="{{$secao->id}}" selected>{{$secao->nome}}</option>
@else
    <option value="{{$secao->id}}">{{$secao->nome}}</option>
@endif