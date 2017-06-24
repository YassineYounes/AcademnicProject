<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/creative.min.css') }}" rel="stylesheet">

    
    <!-- Theme CSS -->
    <link href="css/creative.css" rel="stylesheet">
</head>
<body id="page-top">
    

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Welcome</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                    <li>
                        <a href="{{ url('/home') }}" class="btn  btn-blue">Home</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/login') }}" class="btn  btn-blue">Login</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}" class="btn btn-blue">Register</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Welcome to Pick A Project</h1>
                <hr>
                <p>The official FST application to pick a PFA!</p>
            </div>
        </div>
    </header>
    <script src="{{ asset('js/app.js') }}"></script>
   

</body>

</html>