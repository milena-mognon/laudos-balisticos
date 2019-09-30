@extends('layout.component')
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


@endsection