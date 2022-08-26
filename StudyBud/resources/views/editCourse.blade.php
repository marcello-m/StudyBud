@extends('layouts.logged')

<title>
    @if(isset($course->course_id))
    Edit course
    @else
    Create new course
    @endif
</title>

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('index') }}" class="orange-link">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('course.index') }}" class="orange-link">Manage courses</a></li>
<li class="breadcrumb-item active" aria-current="page">
    @if(isset($course->course_id))
    Edit course
    @else
    Create new course
    @endif
</li>
@endsection

@section('content')
<div class="container">

    <!-- ACTIVE CLASSES -->

    <div class="mb-3" style="margin-top: 3%;">
        <div class="card w-100">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        @if(isset($course->course_id))
                        <h6 class="mb-0">EDIT COURSE</h6>
                        @else
                        <h6 class="mb-0">ADD NEW COURSE</h6>
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
                                <div style="margin: 10px;">
                                <span><b>Course name:</b></span>
                                <input type="text" name="name" placeholder="Nome del corso" style="margin:10px; color:black;" value="{{ $course->name }}" required>
                                </div> 
                                @else
                                <form name='course' method="post" action="{{ route('course.store') }}">
                                    @csrf
                                    <div style="margin:10px;">
                                        <span><b>Course name:</b></span>
                                        <input type="text" name="name" placeholder="Nome del nuovo corso" style="margin:10px; color:black;" required>
                                    </div>
                                    @endif
                                    <div style="margin:10px;">
                                        <span><b>University:</b> {{ $uni->name }}</span>
                                    </div>
                                    <div style="margin:10px">
                                        <span><b>Professor:</b> {{ $user->full_name }}</span>
                                    </div>
                                    @if(isset($course->course_id))
                                    <button type="submit" class="btn btn-primary post-button btn btn-lg login save-edit-btn" style="width: 160px; height: 30px; margin:10px; margin-top:30px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 20 20">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                        </svg><span style="margin-left:6px;">Save changes</span>
                                        @else
                                        <button type="submit" class="btn btn-primary post-button btn btn-lg login save-edit-btn" style="width: 120px; height: 30px; margin:10px; margin-top:30px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 20 20">
                                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                            </svg><span style="margin-left:4px;"> Create </span>
                                            @endif
                                        </button>
                                </form>
                                <a href="{{ route('course.index') }}" style="text-decoration:none;">
                                    <button class="btn btn-primary post-button btn btn-lg login discard-edit-btn" style="width: 120px; height: 30px; margin:10px; margin-top:20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 20 20">
                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                        </svg><span style="margin-left:8px;">Cancel</span>
                                    </button>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection