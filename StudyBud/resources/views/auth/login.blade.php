@extends('layouts.unlogged')

<title>{{ trans('labels.login') }}</title>

@section('content')

                <form name="login" class="logbox" action="{{ route('user.login') }}" method="post" style="margin-top:-20%;">
                    @csrf
                    <h1 style="color: white">{{ trans('labels.login') }}</h1>
                    <p class="text-muted">{{ trans('labels.loginInstructions') }}</p>
                    <input id="username" type="text" placeholder="Username" class="campi" name="username">
                    <span id="invalid-username" class="invalid-field-message"></span>
                    <input id="password" type="password" placeholder="{{ trans('labels.password') }}" class="campi" name="password">
                    <span id="invalid-password" class="invalid-field-message"></span>
                    @if($_SESSION['login_error'])
                    <span id="invalid-credentials" class="invalid-field-message">Wrong credentials</span>
                    @endif
                    <input type="submit" value="Login" class="login btn btn-lg" onclick="event.preventDefault(); checkLogin();">
                    <p class="text-muted">{{ trans('labels.notRegistered') }} <a href="{{ route('user.register') }}" style="color: #f2a365">{{ trans('labels.register') }}</a></p>
                </form>

@endsection