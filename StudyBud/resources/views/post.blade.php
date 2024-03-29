@extends('layouts.logged')

<title>{{ trans('labels.post') }}</title>

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('index') }}" class="orange-link">{{ trans('labels.home') }}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ trans('labels.postBy') }} {{ $post->user->username }} {{ trans('labels.in') }} {{ $course->name }}</li>
@endsection

@section('content')

<div class="col">
    <div class="card" style="padding: 3%; margin-bottom:3%;">
        <h4 class="text-left mb-4 pb-2">{{ trans('labels.postBy') }}
            <a href="{{ route('user.show', [$post->user->user_id]) }}" style="text-decoration:none; color:#f2a365">{{ $post->user->username }}</a>
            {{ trans('labels.in') }}
            <a href="{{ route('course.show',['course'=>$post->course_id]) }}" style="text-decoration:none; color:#f2a365">{{ $post->course->name }}</a>
        </h4>
        <div class="card post-body" style="margin-bottom:0%;">
            <div class="card-body" style="background:#f2f7ff;">
                <a href="{{ route('user.show', [$post->user_id]) }}" style="text-decoration:none;">
                    <img src="{{url('/')}}/img/profile/{{ $post->user->profile_picture }}" class="rounded-circle post-image" style="width:65px; height:65px; margin-left:10px" />
                </a>
                <a href="{{ route('user.show', [$post->user->user_id]) }}" class="post-name">{{ $post->user->username }}</a>
                {{ trans('labels.in') }}
                <a href="{{ route('course.show',['course'=>$post->course_id]) }}" class="mb-3 text-muted post-course-link">{{ $post->course->name }}</a>
                <p class="card-text" style="margin-top: 3%;">{{ $post->content }}</p>
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
    </div>
</div>
<div class="card" style="padding:2%">
    <div class="card-body">
        <h4 class="text-left mb-4 pb-2">{{ trans('labels.comments') }}</h4>
        <div class="row">
            <div class="col">
                <div class="card post-body">
                    <div class="card-body">
                        @if(count($commentsList) > 0)
                        @foreach($commentsList as $comment)
                        <div class="d-flex flex-start" @if($comment->user->role == 'Professor')style="background:#ffece4;margin:10px;border-radius:30px;"@else style="margin:10px; background:#f2f7ff; border-radius:30px"@endif>
                            <a href="{{ route('user.show', [$comment->user_id]) }}" style="text-decoration:none;">
                                <img class="rounded-circle shadow-1-strong me-3" src="{{url('/')}}/img/profile/{{ $comment->user->profile_picture }}" alt="avatar" width="65" height="65" />
                            </a>
                            <div class="flex-grow-1 flex-shrink-1">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-1" style="font-weight: 600;">
                                            <a href="{{ route('user.show', [$comment->user_id]) }}" style="text-decoration:none; color:black;">{{ $comment->user->username }}</a>
                                            @if($comment->user_id==$post->user_id)
                                            <span class="text-muted" style="font-weight:400;"><i>({{ trans('labels.postAuthor') }})</i></span>
                                            @endif
                                        </p>
                                        @if($comment->user_id == $user->user_id or $user->role == 'Professor' or $post->user_id == $user->user_id)
                                        <a href="{{ route('post.comment.destroy',['postId'=>$post->post_id, 'commentId'=>$comment->comment_id]) }}" style="text-decoration:none; color:red; font-weight: 300; margin-right:15px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="margin-right:5px;">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg> {{ trans('labels.deleteComment') }}
                                        </a>
                                        @endif
                                    </div>
                                    <p class="small mb-0">
                                        {{ $comment->content }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="card post-body">
                    <div class="card-body">
                        <h4 style="color:#f2a365; text-align:center; margin-top:20px;">{{ trans('labels.noComments') }}</h4>
                        <h5 style="color:rgba(34, 40, 49, 0.85); text-align:center; margin-top:30px;">{{ trans('labels.noCommentsSubtitle') }}</h5>
                    </div>
                </div>
                @endif
                <form name="comment" action="{{ route('post.comment', ['postId'=>$post->post_id]) }}" method="post">
                    @csrf
                    <div class="input-group" style="margin-top:30px;">
                        <input id="content" type="text" name="content" class="form-control" placeholder="{{ trans('labels.commentPlaceholder') }}">
                    </div>
                    <span id="invalid-content" class="invalid-field-message"></span>
                    <Input type="submit" value="{{ trans('labels.post') }}" class="btn btn-primary post-button btn btn-lg login" onclick="event.preventDefault(); checkComment();">
                </form>
            </div>
        </div>
    </div>
</div>
</section>

@endsection