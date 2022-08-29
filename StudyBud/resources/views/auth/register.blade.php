@extends('layouts.unlogged')

<title>{{ trans('labels.register') }}</title>

@section('content')

<form name="register" class="logbox" action="{{ route('user.register') }}" method="post">
    @csrf
    <h1 style="color:white">{{ trans('labels.register') }}</h1>
    <input id="full_name" type="text" name="full_name" placeholder="{{ trans('labels.full_name') }}" class="campi" style="margin-top:30px;">
    <span id="invalid-fullname" class="invalid-field-message"></span>
    <input id="email" type="text" name="email" placeholder="{{ trans('labels.email') }}" class="campi">
    <span id="invalid-email" class="invalid-field-message"></span>
    <input id="username" type="text" name="username" placeholder="{{ trans('labels.username') }}" class="campi">
    <span id="invalid-username" class="invalid-field-message"></span>
    <select id="uni" name="uni_id" class="campi" style="background-color:rgba(34, 40, 49, 0.85);">
        @foreach($uniList as $uni)
        <option value="{{ $uni->uni_id }}">{{ $uni->name }}</option>
        @endforeach
    </select>
    <span id="invalid-uni" class="invalid-field-message"></span>
    <input id="major" type="text" name="major" placeholder="{{ trans('labels.major') }}" class="campi">
    <span id="invalid-major" class="invalid-field-message"></span>
    <select id="role" name="role" class="campi" style="background-color:rgba(34, 40, 49, 0.85);">
        <option value="Student">{{ trans('labels.student') }}</option>
        <option value="Professor">{{ trans('labels.professor') }}</option>
    </select>
    <span id="invalid-role" class="invalid-field-message"></span>
    <input id="password" type="password" name="password" placeholder="{{ trans('labels.password') }}" class="campi">
    <span id="invalid-password" class="invalid-field-message"></span>
    <input id="register" type="submit" value="{{ trans('labels.register') }}" class="login btn btn-lg" onclick="event.preventDefault(); checkRegistration();">
    <p class="text-muted">{{ trans('labels.alreadyRegistered') }} <a href="{{ route('user.login') }}" style="color: #f2a365">{{ trans('labels.login') }}</a></p>
</form>

@endsection