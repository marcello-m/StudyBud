<title>StudyBud</title>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/style.css">

    <link rel="icon" type="image/x-icon" href="{{url('/')}}/img/page.ico">
</head>

<body id="site-background">
    <style>
        .course-access {
            color: #f2a365;
            font-weight: 500;
            text-decoration: none;
            position: absolute;
            bottom: 5px;
        }
    </style>

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
                        <span style="color:grey;font-weight:600">{{ $loggedName }}</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">{{ trans('labels.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.show', [$user->user_id]) }}">{{ trans('labels.profile') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.logout') }}" style="color:red;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 18 18">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                            </svg> {{ trans('labels.logout') }}</a>
                    </li>
                    <li class="nav-item" style="margin-top:15px">
                        <a href="{{ route('setLang', ['lang' => 'en']) }}"><img src="{{ url('/') }}/img/flags/en.png" width="30px" /></a>
                        <a href="{{ route('setLang', ['lang' => 'it']) }}"><img src="{{ url('/') }}/img/flags/it.png" width="30px" style="margin-left:10px" /></a>
                    </li>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <div class="container">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb" style="margin-top: 2%;">
            <ol class="breadcrumb">
                @yield('breadcrumb')
            </ol>
        </nav>

        @yield('content')

</body>