@extends('layouts.logged')

<title>Post</title>

@section('breadcrumb')
<li class="breadcrumb-item"><a href="home.html" class="orange-link">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Post</li>
@endsection

@section('content')
<div class="col">
    <div class="card post-body">
        <div class="card-body">
            <img src="img/profile.png" class="rounded-circle post-image" />
            <a href="#" class="post-name">Nome Cognome</a>
            in
            <a href="#" class="mb-3 text-muted post-course-link">Nome Corso</a>
            <p class="card-text" style="margin-top: 3%;">Some quick example text to build on the
                card title and make up the
                bulk of the card's content.</p>
            <p><span class="small text-muted">2 hours ago</span></p>
            <button class="btn btn-primary btn btn-lg login post-comment-btn" style="width: 22pt;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                </svg>
            </button>
            <span style="font-weight: 500; margin-inline: 1%;">34</span>
            <button class="btn btn-primary btn btn-lg login post-comment-btn" style="width: 22pt;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
            </button>
        </div>
    </div>
</div>
</div>
</div>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="text-left mb-4 pb-2">Comments</h4>
            <div class="row">
                <div class="col">
                    <div class="d-flex flex-start" style="margin-bottom: 3%;">
                        <img class="rounded-circle shadow-1-strong me-3" src="img/profile.png" alt="avatar" width="65" height="65" />
                        <div class="flex-grow-1 flex-shrink-1">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-1" style="font-weight: 600;">
                                        Nome Cognome <span class="small">- 2 hours ago</span>
                                    </p>
                                </div>
                                <p class="small mb-0">
                                    It is a long established fact that a reader will be distracted by
                                    the readable content of a page.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-start" style="margin-bottom: 3%;">
                        <img class="rounded-circle shadow-1-strong me-3" src="img/profile.png" alt="avatar" width="65" height="65" />
                        <div class="flex-grow-1 flex-shrink-1">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-1" style=" font-weight: 600;">
                                        Nome Cognome <span class="small">- 2 hours ago</span>
                                    </p>
                                </div>
                                <p class="small mb-0">
                                    Altro commento inutile
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection