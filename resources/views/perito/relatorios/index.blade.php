@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Relátorios</h4>
    </div>
    <hr>
    <div class="col-12">
        <div class="row border mb-3">
            <div class="col-lg-3 mt-3">
                {{--{!! Form::open(['route' => ['relatorios.create_report']]) !!}--}}
                <a  href="{{ route('relatorios.create_report') }}" 
                class="btn btn-block btn-primary">Gerar Relatório</a>
{{--                {!! Form::close() !!}--}}
            </div>
        </div>
    </div>
@endsection