@extends('layout.app')
@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="@section('size')
                    col-md-12
@show ">
                <div class="card border-dark mb-3">
                    <div class="card-header text-white bg-dark mb-3">@yield('card-name')</div>
                    <div class="card-body">
                        @include('flash-messege')
                        @yield('card-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
