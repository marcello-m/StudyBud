@extends('layouts.logged')

<title>
    {{ trans('labels.membersList') }} - {{ $course->name }}
</title>

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('index') }}" class="orange-link">{{ trans('labels.home') }}</a></li>
<li class="breadcrumb-item"><a href="{{ route('course.show', [$course->course_id]) }}" class="orange-link">{{ $course->name }}</a></li>
<li class="breadcrumb-item active" aria-current="page">
    {{ trans('labels.membersList') }}
</li>
@endsection

@section('content')
<div class="mb-3" style="margin-top: 3%;">
    <div class="card w-100">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h4 class="mb-0" style="margin:20px;text-transform:uppercase;">{{ trans('labels.membersList') }} - {{ $course->name }}</h4>
                    <!-- DataTable of course memberList -->
                </div>
            </div>
            <div class="row" style="margin-top:30px; margin-inline:20px;">
                <table id="table" class="table table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.name') }}</th>
                            <th>{{ trans('labels.username') }}</th>
                            <th>{{ trans('labels.major') }}</th>
                            <th>{{ trans('labels.role') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($membersList as $member)
                        <tr @if($member->role == 'Professor')style="background:#ffece4;"@endif>
                            <td>{{$member->full_name}}</td>
                            <td>{{$member->username}}</td>
                            <td>{{$member->major}}</td>
                            <td>{{$member->role}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection