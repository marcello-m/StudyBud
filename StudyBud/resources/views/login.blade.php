@extends('layouts.unlogged')

<title>Login</title>

@section('content')
    <!-- Background image -->
    <div id="landing-background" class="bg-image shadow-2-strong">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100">
                <div class="col-md-6">
                    <form class="logbox">
                        <h1 style="color: white">LOGIN</h1>
                        <p class="text-muted">Inserisci il tuo username e la tua password</p>
                        <input type="text" placeholder="Username" class="campi">
                        <input type="password" placeholder="Password" class="campi">
                        <div>
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label text-light">Remember me</label>
                        </div>
                        <input type="submit" value="Login" class="login btn btn-lg">
                        <a class="forgot text-muted" href="#">Password dimenticata?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Background image -->

@endsection