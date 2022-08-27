@extends('layouts.unlogged')

<title>{{ trans('labels.register') }}</title>

@section('content')

<form class="logbox" action="{{ route('user.register') }}" method="post">
    @csrf
    <h1 style="color:white">{{ trans('labels.register') }}</h1>
    <input type="text" name="full_name" placeholder="{{ trans('labels.full_name') }}" class="campi" style="margin-top:30px;">
    <input type="text" name="email" placeholder="{{ trans('labels.email') }}" class="campi">
    <input type="text" name="username" placeholder="{{ trans('labels.username') }}" class="campi">
    <select name="uni_id" class="campi" style="background-color:rgba(34, 40, 49, 0.85);">
        <option value="" selected disabled hidden>{{ trans('labels.uni') }}</option>
        @foreach($uniList as $uni)
        <option value="{{ $uni->uni_id }}">{{ $uni->name }}</option>
        @endforeach
    </select>
    <input type="text" name="major" placeholder="{{ trans('labels.major') }}" class="campi">
    <select name="role" class="campi" style="background-color:rgba(34, 40, 49, 0.85);">
        <option value="" selected disabled hidden>{{ trans('labels.role') }}</option>
        <option value="Student">{{ trans('labels.student') }}</option>
        <option value="Professor">{{ trans('labels.professor') }}</option>
    </select>
    <input type="password" name="password" placeholder="{{ trans('labels.password') }}" class="campi">
    <input type="submit" value="{{ trans('labels.register') }}" class="login btn btn-lg">
    <p class="text-muted">{{ trans('labels.alreadyRegistered') }} <a href="{{ route('user.login') }}" style="color: #f2a365">{{ trans('labels.login') }}</a></p>
</form>

@endsection