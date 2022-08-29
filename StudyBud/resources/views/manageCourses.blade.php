@extends('layouts.logged')

<title>{{ trans('labels.manageCourses') }}</title> 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('index') }}" class="orange-link">{{ trans('labels.home') }}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ trans('labels.manageCourses') }}</li>
@endsection

@section('content')
    <!-- ACTIVE CLASSES -->
    <div class="mb-3" style="margin-top: 3%;">
        <div class="card w-100">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h4 class="mb-0" style="text-transform:uppercase;">{{ trans('labels.yourActiveCourses') }}</h4>
                    </div>
                </div>
                <!-- ENROLLED COURSES -->
                <div class="row">
                    @foreach($enrolledCoursesList as $course)
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <a href="{{ route('course.show',['course'=>$course->course_id]) }}" style="text-decoration:none; color:black;">
                                    <h5 class="card-title">{{ $course->name }}</h5>
                                </a>
                                <br>
                                @if($user->role=='Professor')
                                <a href="{{ route('course.edit',['course'=>$course->course_id]) }}" class="menuhome orange-link course-card-link">{{ trans('labels.edit') }}</a>
                                <span id="warningTxt" value="{{ trans('labels.deleteCourseWarning') }}"></span>
                                <a id="deleteCourse" href="{{ route('course.destroy',['course'=>$course->course_id]) }}" class="menuhome orange-link course-card-link" style="color: #b60000;margin-left:80px;" onclick="return deleteWarningCourse();">{{ trans('labels.delete') }}</a>
                                @else
                                <a id="quitCourse" href="{{ route('course.destroy',['course'=>$course->course_id]) }}" class="menuhome orange-link course-card-link" style="color: #b60000;" onclick="return quitWarningCourse();">{{ trans('labels.quit') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if($user->role=='Professor')
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100" style="background:#ffefe3">
                            <div class="card-body">
                                <h5 class="card-title">{{ trans('labels.createNewCourse') }}</h5>
                                <br>
                                <a href="{{ route('course.create') }}" class="menuhome orange-link course-card-link" style="color: #f2a365;">{{ trans('labels.create') }}</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @if($user->role=='Student')
                <a href="{{ route('index') }}" style="text-decoration: none;">
                    <button class="btn btn-primary post-button btn btn-lg login save-edit-btn" style=" margin:10px; margin-top:20px; width: 100px; height:30px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 20 20">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                        </svg><span style="padding: 2%;">{{ trans('labels.save') }}</span>
                    </button>
                </a>
                @endif
            </div>
        </div>
    </div>
    @if($user->role=='Student')
    <div class="mb-3" style="margin-top: 3%;">
        <div class="card w-100">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h4 class="mb-0" style="text-transform:uppercase;">{{ trans('labels.availableCourses') }}</h4>
                    </div>
                </div>
                <!-- AVAILABLE COURSES -->
                <div class="row">
                    @foreach($availableCoursesList as $course)
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->name }}</h5>
                                <br>
                                <a href="{{ route('course.update',['course'=>$course->course_id]) }}" class="menuhome orange-link course-card-link" style="color: #06a700;">{{ trans('labels.enroll') }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- END ACTIVE CLASSES -->
@endsection