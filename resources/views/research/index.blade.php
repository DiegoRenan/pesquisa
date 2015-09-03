<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CoPeq - UFMT</title>

    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('/assets/css/bootstrap-theme.min.css') }}" rel="stylesheet">

    <link href="{{ asset('/assets/css/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('/assets/css/dashboard.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />

    <link href="{{ asset('/assets/css/summernote.css') }}" rel="stylesheet">

</head>
<body>


<div class="masthead">
    {{--<div class="container head text-right">
        <h1>CoPeQ - CUA</h1>
        <h5>Comissão Científico-tecnológica do Campus Universitário do Araguaia</h5>
    </div>--}}
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">Pesquisa</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @if (Auth::guest())
                    @include('blog.partials._menu')
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/auth/login') }}">Login</a></li>
                        <li><a href="{{ url('/auth/register') }}">Register</a></li>
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</div>

<div class="container-fluid">
    @yield('content')
</div>


<script src="{{ asset('/assets/js/jquery-1.11.3.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/js/summernote.min.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
</body>
</html>