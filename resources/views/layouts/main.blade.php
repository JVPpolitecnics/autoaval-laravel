<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centre d'Estudis Politecnics</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary row">
        <div class="container-fluid col-10 align-self-start">
            <a class="navbar-brand" href="#">
                <img src="../resources/images/logo.png" alt="Politecnic" width="60" height="44">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li  @if(Auth::user()->tipus_usuaris_id ==1) class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dades mestres
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Tipus usuaris</a></li>
                            <li><a class="dropdown-item" href="./usuari">Usuaris</a></li>
                            <li><a class="dropdown-item" href="./cicles">Cicles</a></li>
                            <li><a class="dropdown-item" href="./modul">Mòduls</a></li>
                            <li><a class="dropdown-item" href="#">Assignar Professors</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Assignar alumnes</a></li>
                            <li><a class="dropdown-item" href="#">Resultats aprenentatge</a></li>
                            <li><a class="dropdown-item" href="#">Criteris avaluació</a></li>
                        </ul>
                    </li>
                    @endif
                    <li @if(Auth::user()->tipus_usuaris_id ==2) class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Professors
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Assignar alumnes</a></li>
                            <li><a class="dropdown-item" href="#">Resultats aprenentatge</a></li>
                            <li><a class="dropdown-item" href="#">Criteris avaluació</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Autoavaluació alumnes</a></li>
                        </ul>
                    </li>
                    @endif
                    <li @if(Auth::user()->tipus_usuaris_id ==3) class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Alumnes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Autoavaluació</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="col-2 justify-content-center">
            <div class="row-6 ">

                <svg height="40px" width="40px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60.671 60.671" xml:space="preserve">
                    <g>
                        <g>
                            <ellipse style="fill:#010002;" cx="30.336" cy="12.097" rx="11.997"
                                ry="12.097" />
                            <path style="fill:#010002;" d="M35.64,30.079H25.031c-7.021,0-12.714,5.739-12.714,12.821v17.771h36.037V42.9
     C48.354,35.818,42.661,30.079,35.64,30.079z" />
                        </g>
                    </g>
                </svg>
            </div>
            <div class="row-6">
               
                @if (Auth::check())
                <p>{{ Auth::user()->nom }}</p>
                <!-- Access other user data as needed -->
            @else
                <p>Guest</p>
            @endif
            <form action="{{ route('logout') }}" method="GET">
                @csrf
                <button type="submit">Log out</button>
            </form>
            
            </div>
        </div>

    </nav>
    <div class="container">
        @yield('content')
    </div>

</body>

</html>
