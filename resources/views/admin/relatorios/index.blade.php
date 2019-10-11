@extends('layout.component')
@section('js')
    {!! Html::script('js/calendar.js') !!}
@endsection
@section('page')
    <div class="col-8">
        <h4>Relátorios</h4>
    </div>
    <hr>
    <div class="col-12">
        <div class="row mb-3">
            <div class="col-lg-3 mt-3">
                <a href="{{ route('admin.relatorios.relatorio_completo') }}" class="btn btn-block btn-primary">
                    Relatório Completo
                </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-8">
        <h4>Filtros</h4>
    </div>
    {{ Form::open(['route' => 'admin.relatorios.personalizados'])}}
    <div class="col-12">
        <div class="row mb-3">
            @include('shared.input_calendar', 
            ['label2' => 'Data Inicial', 'name' => 'data_inicial', 'value' => '', 'size' => '3'])

            @include('shared.input_calendar', 
            ['label2' => 'Data Final', 'name' => 'data_final', 'value' => '', 'size' => '3'])

            @include('admin.relatorios.shared.peritos', ['size' => '6'])
            @include('admin.relatorios.shared.secao', ['size' => '6'])
            <div class="col-lg-3 mt-5">
                <button class="btn btn-block btn-primary">Gerar Relatório</button>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection