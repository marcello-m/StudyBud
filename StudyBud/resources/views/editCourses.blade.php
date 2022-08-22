@extends('layouts.logged')

@section('content')
<div class="container">

    <!-- ACTIVE CLASSES -->

    <div class="mb-3" style="margin-top: 3%;">
        <div class="card w-100">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h6 class="mb-0">YOUR ACTIVE COURSES</h6>
                    </div>
                    <div class="col">
                        <a href="profile.php" style="text-decoration: none;">
                            <button type="submit" class="btn btn-primary post-button btn btn-lg login save-edit-btn" style="padding: 0%; margin-top: 0%; margin-bottom: 0%; margin-inline: 50%; width: 30%;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 20 20">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                </svg><span style="padding: 2%;">Save</span>
                            </button>
                        </a>
                        <a href="profile.php" style="text-decoration: none;">
                            <button type="submit" class="btn btn-primary post-button btn btn-lg login discard-edit-btn" style="padding: 0%; margin-top: 1%; margin-bottom: 0%; margin-inline: 50%; width: 30%;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 20 20">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg><span style="padding: 2%;">Discard</span>
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
                                <a href="#" class="menuhome orange-link course-card-link" style="color: #b60000;">Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Digital Image Processing</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link" style="color: #b60000;">Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Machine Learning e Data Mining</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link" style="color: #b60000;">Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Organizzazione e gestione dell'innovazione</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link" style="color: #b60000;">Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Analisi e controllo dei processi complessi</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link" style="color: #b60000;">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3" style="margin-top: 3%;">
        <div class="card w-100">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h6 class="mb-0">AVAILABLE COURSES</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Mobile Programming</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link" style="color: #06a700;">Enroll</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Amministrazione di Sistema</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link" style="color: #06a700;">Enroll</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Calcolo Scientifico</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link" style="color: #06a700;">Enroll</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Interazione uomo-macchina</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link" style="color: #06a700;">Enroll</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Modellistica e Simulazione</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link" style="color: #06a700;">Enroll</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Deep Learning</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link" style="color: #06a700;">Enroll</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 22px;">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Sistemi Informativi Evoluti e Big Data</h5>
                                <br>
                                <a href="#" class="menuhome orange-link course-card-link" style="color: #06a700;">Enroll</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END ACTIVE CLASSES -->

</div>

@endsection