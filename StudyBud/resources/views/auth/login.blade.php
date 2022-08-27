@extends('layouts.unlogged')

<title>{{ trans('labels.login') }}</title>

@section('content')

                <form class="logbox" action="{{ route('user.login') }}" method="post" style="margin-top:-20%;">
                    @csrf
                    <h1 style="color: white">{{ trans('labels.login') }}</h1>
                    <p class="text-muted">{{ trans('labels.loginInstructions') }}</p>
                    <input type="text" placeholder="Username" class="campi" name="username">
                    <input type="password" placeholder="Password" class="campi" name="password">
                    <div>
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label text-light">{{ trans('labels.rememberMe') }}</label>
                    </div>
                    <input type="submit" value="Login" class="login btn btn-lg">
                    <a class="forgot text-muted" href="#">{{ trans('labels.forgotPassword') }}</a>
                    <p class="text-muted">{{ trans('labels.notRegistered') }} <a href="{{ route('user.register') }}" style="color: #f2a365">{{ trans('labels.register') }}</a></p>
                </form>

@endsection