@extends('layouts.unlogged')

<title>Register</title>

@section('content')

<form class="logbox" action="{{ route('user.register') }}" method="post">
    @csrf
    <h1 style="color:white">REGISTRATI</h1>
    <input type="text" name="full_name" placeholder="Nome e Cognome" class="campi">
    <input type="text" name="email" placeholder="Email" class="campi">
    <input type="text" name="username" placeholder="Username" class="campi">
    <label for="role" style="font: Roboto; color:white; margin-right:3%;font-weight:500;">Università: </label>
    <select id="university" name="university" default="">
        <option value="" selected disabled hidden>Seleziona Università</option>
        <option value="unibs">Università degli Studi di Brescia</option>
        <option value="unimi">Università degli Studi di Milano</option>
        <option value="unicatt">Università Cattolica del Sacro Cuore</option>
    </select>
    <input type="text" name="major" placeholder="Corso di Laurea" class="campi">
    <label for="role" style="font: Roboto; color:white; margin-right:3%;font-weight:500;">Ruolo: </label>
    <select id="role" name="role">
        <option value="Student">Studente</option>
        <option value="Professor">Professore</option>
    </select>
    <input type="password" name="password" placeholder="Password" class="campi">
    <input type="submit" value="Registrati" class="login btn btn-lg">
    <p class="text-muted">Già registrato? Effettua il <a href="{{ route('user.login') }}" style="color: #f2a365">login</a></p>
</form>

@endsection