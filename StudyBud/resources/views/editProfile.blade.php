@extends('layouts.logged')

<title>
    {{ trans('labels.editProfile') }} - {{ $user->username }}
</title>

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('index') }}" class="orange-link">{{ trans('labels.home') }}</a></li>
<li class="breadcrumb-item"><a href="{{ route('user.show', [$user->user_id]) }}" class="orange-link">{{ trans('labels.profile') }}</a></li>
<li class="breadcrumb-item active" aria-current="page">
    {{ trans('labels.editProfile') }}
</li>
@endsection

@section('content')
    <div class="mb-3" style="margin-top: 3%;">
        <div class="card w-100">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h4 class="mb-0" style="margin:20px;text-transform:uppercase">{{ trans('labels.editProfile') }}</h4>
                    </div>
                </div>
            </div>
            <div class='card-body'>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <form name='course' method="get" action="{{ route('user.update',['userId'=>$user->user_id]) }}">
                                @csrf
                                <div class="row" style="margin: 10px;">
                                    <div class="col">
                                        <label for="full_name"><b>{{ trans('labels.full_name') }}</b></label>
                                        <input type="text" class="form-control" name="full_name" value="{{ $user->full_name }}">
                                    </div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col">
                                        <label for="username"><b>{{ trans('labels.username') }}</b></label>
                                        <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                                    </div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col">
                                        <label for="email"><b>{{ trans('labels.email') }}</b></label>
                                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col">
                                        <label for="uni_id"><b>{{ trans('labels.uni') }}</b></label>
                                        <select name="uni_id" class="form-select" style="max-width:400px;">
                                            @foreach($uniList as $uni)
                                            <option value="{{ $uni->uni_id }}">{{ $uni->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col">
                                        <label for="major"><b>{{ trans('labels.major') }}</b></label>
                                        <input type="text" class="form-control" name="major" value="{{ $user->major }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary post-button btn btn-lg login save-edit-btn" style="width: 170px; height: 30px; margin:10px; margin-top:30px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 20 20">
                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                    </svg><span style="margin-left:6px;">{{ trans('labels.saveChanges') }}</span>
                                </button>
                            </form>
                            <a href="{{ route('user.show', [$user->user_id]) }}" style="text-decoration:none;">
                                <button class="btn btn-primary post-button btn btn-lg login discard-edit-btn" style="width: 170px; height: 30px; margin:10px; margin-top:20px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 20 20">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                    </svg><span style="margin-left:8px;">{{ trans('labels.cancel') }}</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection