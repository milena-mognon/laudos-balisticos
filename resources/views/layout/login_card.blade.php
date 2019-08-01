@extends('layout.app')
@section('content')
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
               @yield('card-content')
        </div>
    </div>
</div>
@endsection