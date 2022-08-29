@extends('layouts.logged')

<title>
    @if(isset($course->course_id))
    {{ trans('labels.editCourse') }} - {{ $course->name }}
    @else
    {{ trans('labels.newCourse') }}
    @endif
</title>

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('index') }}" class="orange-link">{{ trans('labels.home') }}</a></li>
<li class="breadcrumb-item"><a href="{{ route('course.index') }}" class="orange-link">{{ trans('labels.manageCourses') }}</a></li>
<li class="breadcrumb-item active" aria-current="page">
    @if(isset($course->course_id))
    {{ trans('labels.editCourse') }} - {{ $course->name }}
    @else
    {{ trans('labels.newCourse') }}
    @endif
</li>
@endsection

@section('content')
<div class="mb-3" style="margin-top: 3%;">
    <div class="card w-100">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    @if(isset($course->course_id))
                    <h4 class="mb-0" style="margin:20px;text-transform:uppercase">{{ trans('labels.editCourse') }}</h4>
                    @else
                    <h4 class="mb-0" style="margin:20px;text-transform:uppercase">{{ trans('labels.newCourse') }}</h4>
                    @endif
                </div>
            </div>
        </div>
        <div class='card-body'>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        @if(isset($course->course_id))
                        <form name='course' method="get" action="{{ route('course.update',['course'=>$course->course_id]) }}">
                            @csrf
                            <input type="text" id="courseId" name="id" value="{{ $course->course_id }}" disabled hidden>
                            <div class="row" style="margin: 10px;">
                                <div class="col">
                                    <label for="name"><b>{{ trans('labels.courseName') }}</b></label>
                                    <input type="text" id="courseName" class="form-control" name="name" value="{{ $course->name }}">
                                </div>
                                <span id="invalid-course-name" class="invalid-field-message"></span>
                            </div>
                            @else
                            <form name='course' method="post" action="{{ route('course.store') }}">
                                @csrf
                                <div class="row" style="margin: 10px;">
                                    <div class="col">
                                        <label for="name"><b>{{ trans('labels.courseName') }}</b></label>
                                        <input type="text" id="courseName" class="form-control" name="name">
                                    </div>
                                    <span id="invalid-course-name" class="invalid-field-message"></span>
                                </div>
                                @endif
                                <div class="row" style="margin: 10px;">
                                    <div class="col">
                                        <label for="uni"><b>{{ trans('labels.uni') }}</b></label>
                                        <input type="text" class="form-control" name="uni" value="{{ $uni->name }}" disabled>
                                    </div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col">
                                        <label for="professor"><b>{{ trans('labels.professor') }}</b></label>
                                        <input type="text" class="form-control" name="professor" value="{{ $user->full_name }}" disabled>
                                    </div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary post-button btn btn-lg login save-edit-btn" style="width: 170px; height: 30px; margin:10px; margin-top:20px;" onclick="event.preventDefault(); checkCourseTitle();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 20 20">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                        </svg>
                                        @if(isset($course->course_id))
                                        {{ trans('labels.saveChanges') }}
                                        @else
                                        <span style="margin-left:4px;"> {{ trans('labels.create') }} </span>
                                        @endif
                                    </button>
                                    </div>
                                    <div class="col-9">
                                    <a href="{{ route('course.index') }}" style="text-decoration:none;">
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