@extends('layouts.logged')

<title>Corso</title>

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('index') }}" class="orange-link">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $course->name }}</li>
@endsection

@section('content')
<!-- PROFILE PIC AND GENERAL INFO -->
<div class="row">
    <div class="col-md-4" style="margin-bottom: 8%;">
        <div class="card">
            <div class="flex-column align-items-center text-center">
                <img src="{{url('/')}}/img/profile.png" alt="Admin" class="rounded-circle" style="margin-top: 10%" width="150">
                <div class="mt-4">
                    <h4><a href="{{ route('user.show', [$user->user_id]) }}" style="text-decoration: none; color: #30475E;">{{ $user->full_name }}</a></h4>
                    <h6 class="text-secondary">{{ $_SESSION['loggedName'] }}</h6>
                    <p class="text-secondary mb-1">{{ $user->role }}</p>
                    <p class="text-muted font-size-sm">{{ $user->university }}</p>
                </div>
                <div style="margin-bottom: 10%">
                    <a href="{{ route('user.show', [$user->user_id]) }}" class="orange-link">Profilo</a>
                </div>
                <hr style="margin-left:6%; margin-right:6%;">
            </div>
            <div class="card-body">
                <p style="font-weight: 600; text-align: center;">CORSI ATTIVI</p>
                @foreach($courseList as $coursePanel)
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
    <!-- END PROPIC AND INFO -->

    <!-- POST FEED -->
    <div class="col" style="margin-bottom: 8%;">
        <div class="card" style="padding: 5%;">
            <h1 style="color: #30475E;">{{$course->name}}</h1>
            <h6><b>Professore: </b><a href="{{ route('user.show', [$professor->user_id]) }}" style="text-decoration:none; color:#f2a365">{{$professor->full_name}}</a></h6>
            <!-- NEW POST -->
            <form action="{{ route('post.course', ['course'=>$course->course_id]) }}" method="post">
                @csrf
                <div class="input-group" style="margin-top:20px;">
                    <input type="text" name="content" class="form-control" placeholder="Write a post...">
                </div>
                <Input type="submit" value="Post" class="btn btn-primary post-button btn btn-lg login">
            </form>
            <!-- END NEW POST -->

            @if(count($postList)!=0)
            @foreach($postList as $post)
            <div class="card post-body" @if($post->user->role == 'Professor')style="background:#fcf8d9;"@endif>
                <div class="card-body">
                    <img src="{{url('/')}}/img/profile.png" class="rounded-circle post-image" />
                    <a href="{{ route('user.show', [$user->user_id]) }}" class="post-name">{{ $post->user->username }}</a>
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
                    <a href="{{ route('post.show',['postId'=>$post->post_id]) }}">
                        <button type="button" class="btn btn-primary btn btn-lg login post-comment-btn" style="margin-left: 5%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg> Comment ({{ count($post->comments) }})
                        </button>
                    </a>
                    @if($post->user_id == $user->user_id or ($user->role == 'Professor' and $post->course->professor_id == $user->user_id))
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
                    <h2 style="color:#f2a365; text-align:center; margin-top:20px">Sembra che nessuno abbia ancora scritto un post!</h2>
                    <h4 style="color:rgba(34, 40, 49, 0.85); text-align:center; margin-top:30px;">Scrivi un nuovo post nel campo sopra</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- END POST FEED -->

</div>
@endsection