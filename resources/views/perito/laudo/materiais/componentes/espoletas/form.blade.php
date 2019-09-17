@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => ['conmponentes.store', $laudo ]]) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['componentes.update', $laudo, $componente], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

<input type="hidden" name="laudo_id" id="laudo_id" value="{{ $laudo->id }}">
<input type="hidden" name="componente" id="componente" value="Espoletas">

<div class="col-lg-12" style="padding: 0 5% 0">
    <div class="row mb-3">


    </div>
</div>