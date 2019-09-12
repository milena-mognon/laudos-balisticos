<input type="hidden" name="{{ $col_name ?? '' }}" value="{{ $value ?? '' }}">
<a class="btn btn-dark btn-md btn-block mb-3" href="{{ route($route, [$laudo]) }}">{{ $value }}</a>