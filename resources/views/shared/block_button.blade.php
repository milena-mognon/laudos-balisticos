{{--{{  Form::open(['route' => $route]) }}--}}
    <input type="hidden" name="laudo_id" value="{{$laudo_id}}">
    <input type="hidden" name="{{ $col_name }}" value="{{ $value }}">
    <a class="btn btn-secondary btn-lg btn-block" href="{{ route($route, [$laudo_id]) }}">{{ $value }}</a>
<p></p>
{{--{{ Form::close() }}--}}