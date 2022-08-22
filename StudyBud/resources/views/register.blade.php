@extends('layouts.unlogged')

<title>Register</title>

@section('content')

    <!-- Background image -->
    <div id="landing-background" class="bg-image shadow-2-strong">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100">
                <div class="col-md-6">
                    <form class="logbox shadow">
                        <h1 style="color:white">REGISTRATI</h1>
                        <input type="text" placeholder="Nome" class="campi">
                        <input type="text" placeholder="Cognome" class="campi">
                        <input type="text" placeholder="Email" class="campi">
                        <input type="text" placeholder="Username" class="campi">
                        <input type="password" placeholder="Password" class="campi">
                        <input type="password" placeholder="Ripeti Password" class="campi">
                        <input type="submit" value="Registrati" class="login btn btn-lg">
                        <p class="text-muted">Già registrato? Effettua il <a href="login.html" style="color: #f2a365">login</a></p>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Background image -->

@endsection