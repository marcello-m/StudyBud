@extends('layouts.logged')

<title>Profilo</title>

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('index') }}" class="orange-link">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Profilo</li>
@endsection

@section('content')

<!-- PROFILE PIC AND GENERAL INFO -->
<div class="row gutters-sm">
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div>
                <div class="d-flex flex-column align-items-center text-center" style="margin-top: 10%;">
                    <img src="{{url('/')}}/img/profile.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-4">
                        <h4><a href="{{ route('user.show', [$user->user_id]) }}" style="text-decoration: none; color: #30475E;">{{ $user->full_name }}</a></h4>
                        <h6 class="text-secondary">{{ $user->username }}</h6>
                        <p class="text-secondary mb-1">{{ $user->role }}</p>
                        <p class="text-muted font-size-sm">{{ $uni->name }}</p>
                    </div>
                    <hr style="margin-left:6%; margin-right:6%;">
                </div>
                <div class="card-body">
                    <p style="font-weight: 600; text-align: center;">CORSI ATTIVI</p>
                    @foreach($enrolledCoursesList as $coursePanel)
                    <div class="card" style="margin-bottom:20px;">
                        <div class="card-body">
                            <a href="{{ route('course.show',['course'=>$coursePanel->course_id]) }}" style="text-decoration:none; color:black;">
                                <h5 class="card-title">{{ $coursePanel->name }}</h5>
                            </a>
                            <br>
                            <a href="{{ route('course.show',['course'=>$coursePanel->course_id]) }}" class="menuhome orange-link course-card-link">Accedi al corso</a>
                        </div>
                    </div>
                    @endforeach
                    <a href="{{ route('course.index') }}" style="text-decoration:none"><button class="btn btn-primary post-button btn btn-lg login" style="width:40%;margin-top:20px;min-height:50px">Gestisci i corsi</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- END PROPIC AND INFO -->

    <!-- PROFILE DETAILS -->

    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-body" style="margin-top:2%;">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">User</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->username }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->full_name }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->email }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">University</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $uni->name }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Major</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->major }}
                    </div>
                </div>
                @if($user->user_id == $loggedUser->user_id)
                <hr>
                <a href="{{ route('user.edit',['userId'=>$user->user_id]) }}" style="text-decoration: none;">
                    <button type="submit" class="btn btn-primary post-button btn btn-lg login" style="align-content:center; min-width:120px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg><span style="padding: 6%;">Edit profile</span>
                    </button>
                </a>
                @else
                <div style="margin-bottom:2%;"></div>
                @endif
            </div>
        </div>

        <!-- END PROFILE DETAILS -->

        <!-- MY POSTS -->
        <div class="card" style="padding: 5%;">

            <div class="card" style="margin-bottom:30px; border:0;">
                @if($user->user_id == $loggedUser->user_id)
                <h4>I miei post</h4>
                @else
                <h4>I post di {{ $user->username }}</h4>
                @endif
            </div>
            @if(count($enrolledCoursesList)!=0)
            @if(count($postList)!=0)
            @foreach($postList as $post)
            <div class="card post-body">
                <div class="card-body">
                    <img src="{{url('/')}}/img/profile.png" class="rounded-circle post-image" />
                    <a href="{{ route('user.show', [$post->user_id]) }}" class="post-name">{{ $post->user->username }}</a>
                    in
                    <a href="{{ route('course.show',['course'=>$post->course_id]) }}" class="mb-3 text-muted post-course-link">{{ $post->course->name }}</a>
                    <p class="card-text" style="margin-top: 3%;">{{ $post->content }}</p>
                    <button class="btn btn-primary btn btn-lg login post-comment-btn" style="width: 22pt;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                        </svg>
                    </button>
                    <span style="font-weight: 500; margin-inline: 1%;">0</span>
                    <button class="btn btn-primary btn btn-lg login post-comment-btn" style="width: 22pt;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                    <a href="{{ route('post.show',['postId'=>$post->post_id]) }}" style="text-decoration:none;">
                        <button type="button" class="btn btn-primary btn btn-lg login post-comment-btn" style="margin-left: 5%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg> Comment ({{ count($post->comments) }})
                        </button>
                    </a>
                    @if($user->user_id == $loggedUser->user_id or ($user->role=='Student' and $loggedUser->role=='Professor' and $post->course->professor_id==$loggedUser->user_id))
                    <a href="{{ route('post.destroy',['postId'=>$post->post_id]) }}">
                        <button type="button" class="btn btn-primary btn btn-lg login post-delete-btn" style="margin-left: 5%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="margin-right:5px;">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg> Delete post
                        </button>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
            @else
            <div class="card post-body">
                <div class="card-body">
                    @if($user->user_id == $loggedUser->user_id)
                    <h2 style="color:#f2a365; text-align:center; margin-top:20px">Non hai ancora scritto un post!</h2>
                    <h4 style="color:rgba(34, 40, 49, 0.85); text-align:center; margin-top:30px;">Vai nella home o nella pagina di un corso per scrivere il tuo primo post</h4>
                    @else
                    <h2 style="color:#f2a365; text-align:center; margin-top:20px">{{ $user->username }} non ha ancora scritto un post!</h2>
                    @endif
                </div>
            </div>
            @endif
            @else
            <div class="card post-body">
                <div class="card-body">
                    @if($user->user_id == $loggedUser->user_id)
                    <h2 style="color:#f2a365; text-align:center; margin-top:20px">Sembra che tu non sia iscritto a nessun corso!</h2>
                    <h4 style="color:rgba(34, 40, 49, 0.85); text-align:center; margin-top:30px;">Iscriviti ai corsi che segui per iniziare a vedere i post</h4>
                    <a href="{{ route('course.index') }}" style="text-decoration:none"><button class="btn btn-primary post-button btn btn-lg login" style="width:40%;margin-top:40px;min-height:50px">Scopri i corsi disponibili</button></a>
                    @else
                    <h2 style="color:#f2a365; text-align:center; margin-top:20px">{{ $user->username }} non è iscritto a nessun corso!</h2>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- END MY POSTS -->
</div>
@endsection