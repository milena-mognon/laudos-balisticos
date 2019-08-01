@extends('layout.login')
@section('content')
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            {{ Form::open(['route' => 'login']) }}
            @include('flash-messege')
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="form-label-group">
                    <input id="email" type="email" class="form-control" name="email" required
                           autofocus>
                    <label for="email">E-Mail</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="form-label-group">
                    <input id="password" type="password" class="form-control" name="password" required>
                    <label for="password">Senha</label>
                    @if ($errors->has('password'))
                        <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div class="text-center">
                <div class="btn-block">
                    <a href=" {{ route('home') }}" class="btn btn-secondary">
                        Voltar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
