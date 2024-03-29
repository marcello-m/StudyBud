<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/style.css">

  <link rel="icon" type="image/x-icon" href="{{url('/')}}/img/page.ico">

  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="{{ url('/') }}/js/myScript.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="{{ url('/') }}/js/myScript.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- NAVBAR -->
  <nav class="navbar navbar-dark bg-dark" aria-label="First navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('index') }}"><img height="50" src="{{url('/')}}/img/Logo.png"></a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- DROPDOWN MENU -->
      <div class="navbar-collapse collapse" id="navbarsExample01">
        <ul class="navbar-nav me-auto mb-2">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.login') }}">{{ trans('labels.login') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.register') }}">{{ trans('labels.register') }}</a>
          </li>
          <li class="nav-item" style="margin-top:15px">
            <a href="{{ route('setLang', ['lang' => 'en']) }}"><img src="{{ url('/') }}/img/flags/en.png" width="30px" /></a>
            <a href="{{ route('setLang', ['lang' => 'it']) }}"><img src="{{ url('/') }}/img/flags/it.png" width="30px" style="margin-left:10px" /></a>
          </li>
      </div>
    </div>
  </nav>
  <!-- NAVBAR END -->
  <div id="landing-background" class="bg-image shadow-2-strong">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
      <div class="container d-flex align-items-center justify-content-center text-center h-100">
        <div class="col-md-6">

          @yield('content')

        </div>
      </div>
    </div>
  </div>
</body>