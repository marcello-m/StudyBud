@extends('layouts.logged')

<title>{{ $course->name }}</title>

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('index') }}" class="orange-link">{{ trans('labels.home') }}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $course->name }}</li>
@endsection

@section('content')
<!-- PROFILE PIC AND GENERAL INFO -->
<div class="row">
    <div class="col-md-4" style="margin-bottom: 8%;">
        <div class="card">
            <div class="flex-column align-items-center text-center">
                <a href="{{ route('user.show', [$user->user_id]) }}">
                    <img src="{{url('/')}}/img/profile/{{ $user->profile_picture }}" alt="Admin" class="rounded-circle" style="margin-top: 10%" width="150" height="150">
                </a>
                <div class="mt-4">
                    <h4><a href="{{ route('user.show', [$user->user_id]) }}" style="text-decoration: none; color: #30475E;">{{ $user->full_name }}</a></h4>
                    <h6 class="text-secondary">{{ $_SESSION['loggedName'] }}</h6>
                    @if($user->role == 'Professor')
                    <p class="text-secondary mb-1">{{ trans('labels.professor') }}</p>
                    @else
                    <p class="text-secondary mb-1">{{ trans('labels.student') }}</p>
                    @endif
                    <p class="text-muted font-size-sm">{{ $uni->name }}</p>
                </div>
                <div style="margin-bottom: 10%">
                    <a href="{{ route('user.show', [$user->user_id]) }}" class="orange-link">{{ trans('labels.profile') }}</a>
                </div>
                <hr style="margin-left:6%; margin-right:6%;">
            </div>
            <div class="card-body">
                <p style="font-weight: 600; text-align: center; text-transform:uppercase">{{ trans('labels.activeCourses') }}</p>
                @foreach($courseList as $coursePanel)
                <div class="card" style="margin-bottom:20px; background:#f2f7ff;">
                    <div class="card-body">
                        <a href="{{ route('course.show',['course'=>$coursePanel->course_id]) }}" style="text-decoration:none; color:black;">
                            <h5 class="card-title">{{ $coursePanel->name }}</h5>
                        </a>
                        <br>
                        <a href="{{ route('course.show',['course'=>$coursePanel->course_id]) }}" class="menuhome orange-link course-card-link">{{ trans('labels.accessCourse') }}</a>
                    </div>
                </div>
                @endforeach
                <a href="{{ route('course.index') }}" style="text-decoration:none"><button class="btn btn-primary post-button btn btn-lg login" style="width:40%;margin-top:20px;min-height:50px">{{ trans('labels.manageCourses') }}</button></a>
            </div>
        </div>
    </div>
    <!-- END PROPIC AND INFO -->

    <!-- POST FEED -->
    <div class="col mb-3">
        <div class="card" style="padding: 5%;">
            <h1 style="color: #30475E;">{{$course->name}}</h1>
            <h6><b>{{ trans('labels.professor') }}: </b><a href="{{ route('user.show', [$professor->user_id]) }}" style="text-decoration:none; color:#f2a365">{{$professor->full_name}}</a></h6>
            <h6><b>{{ trans('labels.members') }}: </b><a href="{{ route('course.members', [$course->course_id]) }}" style="text-decoration:none; color:#f2a365">{{ trans('labels.seeList') }}</a></h6>
            <!-- NEW POST -->
            <form name="post" action="{{ route('post.course', ['course'=>$course->course_id]) }}" method="post">
                @csrf
                <div class="input-group" style="margin-top:20px;">
                    <input id="content" type="text" name="content" class="form-control" placeholder="{{ trans('labels.postPlaceholder') }}">
                </div>
                <span id="invalid-content" class="invalid-field-message"></span>
                <Input type="submit" value="{{ trans('labels.post') }}" class="btn btn-primary post-button btn btn-lg login" onclick="event.preventDefault(); checkPost();">
            </form>
            <!-- END NEW POST -->
            @if(count($postList)!=0)
            @foreach($postList as $post)
            <div id="postCard" class="card post-body" @if($post->user->role == 'Professor')style="background:#ffece4;"@else style="background:#f2f7ff"@endif>
                <div class="card-body">
                    <a href="{{ route('user.show', [$post->user_id]) }}" style="text-decoration:none;">
                        <img src="{{url('/')}}/img/profile/{{ $post->user->profile_picture }}" class="rounded-circle post-image" />
                    </a>
                    <a href="{{ route('user.show', [$post->user->user_id]) }}" class="post-name">{{ $post->user->username }}</a>
                    {{ trans('labels.in') }}
                    <a href="{{ route('course.show',['course'=>$post->course_id]) }}" class="mb-3 text-muted post-course-link">{{ $post->course->name }}</a>
                    <p class="card-text" style="margin-top: 3%;">{{ $post->content }}</p>
                    <a href="{{ route('post.show',['postId'=>$post->post_id]) }}" style="text-decoration:none;">
                        <button type="button" class="btn btn-primary btn btn-lg login post-comment-btn" style="margin-left: 5%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg> {{ trans('labels.comments') }} ({{ count($post->comments) }})
                        </button>
                    </a>
                    @if($post->user_id == $user->user_id or ($user->role == 'Professor' and $post->course->professor_id == $user->user_id))
                    <a href="{{ route('post.destroy',['postId'=>$post->post_id]) }}">
                        <button type="button" class="btn btn-primary btn btn-lg login post-delete-btn" style="margin-left: 5%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="margin-right:5px;">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg> {{ trans('labels.deletePost') }}
                        </button>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
            @else
            <div class="card post-body">
                <div class="card-body">
                    <h2 style="color:#f2a365; text-align:center; margin-top:20px">{{ trans('labels.noPosts') }}</h2>
                    <h4 style="color:rgba(34, 40, 49, 0.85); text-align:center; margin-top:30px;">{{ trans('labels.noPostsSubtitle') }}</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- END POST FEED -->

</div>
@endsection