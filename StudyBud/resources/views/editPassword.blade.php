@extends('layouts.logged')

<title>
    {{ trans('labels.editPassword') }}
</title>

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('index') }}" class="orange-link">{{ trans('labels.home') }}</a></li>
<li class="breadcrumb-item"><a href="{{ route('user.show', [$user->user_id]) }}" class="orange-link">{{ trans('labels.profile') }}</a></li>
<li class="breadcrumb-item active" aria-current="page">
    {{ trans('labels.editPassword') }}
</li>
@endsection

@section('content')
<div class="mb-3" style="margin-top: 3%;">
    <div class="card w-100">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h4 class="mb-0" style="margin:20px;text-transform:uppercase">{{ trans('labels.editPassword') }}</h4>
                </div>
            </div>
        </div>
        <div class='card-body'>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <form name='editPassword' method="get" action="{{ route('user.update.password', ['userId'=>$user->user_id]) }}">
                            @csrf
                            <div class="row" style="margin: 10px;">
                                <div class="col">
                                    <label for="oldPassword"><b>{{ trans('labels.oldPassword') }}</b></label>
                                    <input type="password" id="oldPassword" class="form-control" name="oldPassword">
                                </div>
                                <span id="invalid-old-password" class="invalid-field-message"></span>
                                @if($_SESSION['passwordEditError'])
                                <span id="invalid-old-pwd" class="invalid-field-message">Wrong password</span>
                                @endif
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col">
                                    <label for="newPassword"><b>{{ trans('labels.newPassword') }}</b></label>
                                    <input type="password" id="newPassword" class="form-control" name="newPassword">
                                </div>
                                <span id="invalid-new-password" class="invalid-field-message"></span>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col">
                                    <label for="newPasswordConfirm"><b>{{ trans('labels.passwordConfirmation') }}</b></label>
                                    <input type="password" id="confirmPassword" class="form-control" name="newPasswordConfirm">
                                </div>
                                <span id="invalid-confirm-password" class="invalid-field-message"></span>

                                <h6 style="margin-top:30px; color:aa3b3b;"><b>{{ trans('labels.passwordUpdateWarning') }}</b></h6>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary post-button btn btn-lg login save-edit-btn" style="width: 170px; height: 30px; margin:10px; margin-top:20px;" onclick="event.preventDefault(); checkEditPassword();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 20 20">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                        </svg>
                                        {{ trans('labels.saveChanges') }}
                                    </button>
                                </div>
                                <div class="col-9">
                                    <a href="{{ route('user.show', [$user->user_id]) }}" style="text-decoration:none;">
                                        <button type="button" class="btn btn-primary post-button btn btn-lg login discard-edit-btn" style="width: 170px; height: 30px; margin:10px; margin-top:20px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 20 20">
                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                            </svg><span style="margin-left:8px;">{{ trans('labels.cancel') }}</span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection