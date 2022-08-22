@extends('layouts.logged')

<title>Profilo</title>

@section('breadcrumb')
<li class="breadcrumb-item"><a href="home.html" class="orange-link">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Profilo</li>
@endsection

@section('content')

<!-- PROFILE PIC AND GENERAL INFO -->
<div class="row gutters-sm">
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div>
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="img/profile.png" alt="Admin" class="rounded-circle" style="margin-top: 10%;" width="150">
                    <div class="mt-4">
                        <h4>Nome Cognome</h4>
                        <h6 class="text-secondary">Username</h6>
                        <p class="text-secondary mb-1">Student</p>
                        <p class="text-muted font-size-sm">Università degli Studi di Brescia</p>
                    </div>
                </div>
                <div class="progress" style="margin:10%">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; background-color: #f2a365;">75%</div>
                </div>
                <div class="mt-3">
                    <h6 style="text-align: center">Credits 90/120</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- END PROPIC AND INFO -->

    <!-- PROFILE DETAILS -->

    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">User</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        Marcello_M
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        Marcello Manenti
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        m.manenti016@studenti.unibs.it
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Istitution</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        Università degli Studi di Brescia
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Degree</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        Magistrale
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Major</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        Ingegneria Informatica
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Year</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        2
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Credits</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        90/120
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END PROFILE DETAILS -->

    <!-- ACTIVE CLASSES -->

    <div class="mb-3">
        <div class="card w-100">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h6 class="mb-0">ACTIVE COURSES</h6>
                    </div>
                    <div class="col">
                        <a href="editCourses.html" style="text-decoration: none;">
                            <button type="submit" class="btn btn-primary post-button btn btn-lg login" style="padding: 0%; margin-top: 0%; margin-bottom: 0%; margin-inline: 50%; width: 40%;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 18 18">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg><span style="padding: 2%;">Edit courses</span>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Programmazione Web e Servizi Digitali</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link">Accedi al corso</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Digital Image Processing</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link">Accedi al corso</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Machine Learning e Data Mining</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link">Accedi al corso</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Organizzazione e gestione dell'innovazione</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link">Accedi al corso</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Analisi e controllo dei processi complessi</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link">Accedi al corso</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END ACTIVE CLASSES -->
</div>
</div>
@endsection