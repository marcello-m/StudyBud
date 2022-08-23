@extends('layouts.unlogged')

<title>Login</title>

@section('content')

                <form class="logbox" action="{{ route('user.login') }}" method="post">
                    @csrf
                    <h1 style="color: white">LOGIN</h1>
                    <p class="text-muted">Inserisci il tuo username e la tua password</p>
                    <input type="text" placeholder="Username" class="campi" name="username">
                    <input type="password" placeholder="Password" class="campi" name="password">
                    <div>
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label text-light">Remember me</label>
                    </div>
                    <input type="submit" value="Login" class="login btn btn-lg">
                    <a class="forgot text-muted" href="#">Password dimenticata?</a>
                    <p class="text-muted">Non sei ancora iscritto? <a href="{{ route('user.register') }}" style="color: #f2a365">Registrati</a></p>
                </form>

@endsection