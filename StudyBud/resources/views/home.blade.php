@extends('layouts.logged')

<title>Home</title>

@section('breadcrumb')
<li class="breadcrumb-item"><a href="home.html" class="orange-link">Home</a></li>
@endsection

@section('content')
<!-- PROFILE PIC AND GENERAL INFO -->
<div class="row">
    <div class="col-md-4" style="margin-bottom: 8%;">
        <div class="card">
            <div class="flex-column align-items-center text-center">
                <img src="img/profile.png" alt="Admin" class="rounded-circle" style="margin-top: 10%" width="150">
                <div class="mt-4">
                    <h4><a href="profile.php" style="text-decoration: none; color: #30475E;">Nome
                            Cognome</a></h4>
                    <h6 class="text-secondary">Username</h6>
                    <p class="text-secondary mb-1">Studente</p>
                    <p class="text-muted font-size-sm">Università degli Studi di Brescia</p>
                </div>
                <div style="margin-bottom: 10%">
                    <a href="profile.php" class="orange-link">Profilo</a>
                </div>
                <hr style="margin-left:6%; margin-right:6%;">
            </div>
            <div class="card-body">
                <p style="font-weight: 600; text-align: center;">CORSI ATTIVI</p>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Digital Image Processing</h5>
                        <br>
                        <a href="course.html" class="menuhome orange-link course-card-link">Accedi al corso</a>
                    </div>
                </div>
                <div class="card" style="margin-top: 8%;">
                    <div class="card-body">
                        <h5 class="card-title">Machine Learning e Data Mining</h5>
                        <br>
                        <a href="#" class="menuhome orange-link course-card-link">Accedi al corso</a>
                    </div>
                </div>
                <div class="card" style="margin-top: 8%;">
                    <div class="card-body">
                        <h5 class="card-title">Organizzazione e gestione dell'innovazione</h5>
                        <br>
                        <a href="#" class="menuhome orange-link course-card-link">Accedi al corso</a>
                    </div>
                </div>
                <div class="card" style="margin-top: 8%;">
                    <div class="card-body">
                        <h5 class="card-title">Analisi e controllo dei processi complessi</h5>
                        <br>
                        <a href="#" class="menuhome orange-link course-card-link">Accedi al corso</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PROPIC AND INFO -->

    <!-- POST FEED -->
    <div class="col" style="margin-bottom: 8%;">
        <div class="card" style="padding: 5%;">
            <!-- NEW POST -->
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Write a post...">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Corso</button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Digital Image Processing</a></li>
                    <li><a class="dropdown-item" href="#">Machine Learning e Data Mining</a></li>
                    <li><a class="dropdown-item" href="#">Organizzazione e gestione dell'innovazione</a></li>
                    <li><a class="dropdown-item" href="#">Analisi e controllo dei processi complessi</a></li>
                </ul>
            </div>

            <button type="submit" class="btn btn-primary post-button btn btn-lg login">Post</button>
            <!-- END NEW POST -->

            <!-- POST EXAMPLES -->
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
                    <a href="post.html">
                        <button type="button" class="btn btn-primary btn btn-lg login post-comment-btn" style="margin-left: 5%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg> Comment
                        </button>
                    </a>
                </div>
            </div>
            <div class="card post-body">
                <div class="card-body">
                    <img src="img/profile.png" class="rounded-circle post-image" />
                    <a href="#" class="post-name">Nome Cognome</a>
                    in
                    <a href="#" class="mb-3 text-muted post-course-link">Nome Corso</a>
                    <p class="card-text" style="margin-top: 3%;">Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit. Donec vitae sem accumsan, consequat magna a, pellentesque nibh.
                        Praesent scelerisque risus risus, quis rutrum risus iaculis a. Fusce mauris magna,
                        rhoncus vitae lobortis vel, facilisis id dui. Vivamus feugiat ultrices sem ut
                        congue. Praesent mattis urna ex, vel ultrices sapien placerat ac. Praesent interdum
                        ac sem maximus commodo. Quisque augue ante, blandit a tortor ac, finibus maximus
                        nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                        cubilia curae; Phasellus vel accumsan nisl, nec scelerisque arcu. Praesent pharetra
                        vitae dui id tempor.</p>
                    <p><span class="small text-muted">4 hours ago</span></p>
                    <button class="btn btn-primary btn btn-lg login post-comment-btn" style="width: 22pt;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                        </svg>
                    </button>
                    <span style="font-weight: 500; margin-inline: 1%;">14</span>
                    <button class="btn btn-primary btn btn-lg login post-comment-btn" style="width: 22pt;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                    <a href="post.html">
                        <button type="button" class="btn btn-primary btn btn-lg login post-comment-btn" style="margin-left: 5%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg> Comment
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END POST FEED -->

</div>
@endsection