@extends('layouts.unlogged')

<title>StudyBud</title>

@section('content')
  <!-- PAGE CENTER -->
  <!-- Background image -->
  <div id="landing-background" class="bg-image shadow-2-strong">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
      <div class="container d-flex align-items-center justify-content-center text-center h-100">
        <div class="text-white">
          <h1 style="font-size: 80px">Study<span style="color:#f2a365">Bud</span></h1>
          <h5 class="mb-4">Il miglior portale per le comunità studentesche</h5>
          <a class="login btn btn-lg m-2" href="{{ route('user.login') }}" role="button">Login</a>
          <a class="login btn btn-lg m-2" href="{{ route('user.register') }}" role="button">Register</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
@endsection