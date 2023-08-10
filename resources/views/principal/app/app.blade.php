<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Retiros LiliY&oi- @yield('title')</title>







    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('libs/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="" crossorigin="anonymous">


</head>
<style>
    .scroll {
        max-height: 60vh;
        overflow-y: auto;
    }

    *::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    *::-webkit-scrollbar-track {
        background: #646464;
    }

    *::-webkit-scrollbar-thumb {
        background-color: #e75199;
        border-radius: 20px;
        border: 3px solid transparent;
    }

    /* cambiar tipo de letra */
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-light border-bottom fixed-top" style="background-color: #fff;">
        {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link " href="{{ route('home.index') }}"><img
                            src="{{ asset('images/pageindex/logo.png') }}" style="width: 30vh" alt=""></a>
                </li>
                <li class="nav-item active  pt-3 ps-3 text-center align-items-center justify-content-center">
                    <a class="nav-link" href="{{ route('home.index') }}"><b  style="color: rgb(255, 189, 6)">Inicio</b><span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ps-3 pt-3" >
                    <a class="nav-link   "  style="color: rgb(6, 168, 159)" href="{{route('home.nosotros')}}"><b>Nosotros</b></a>
                </li>
                <li class="nav-item ps-3 pt-3" >
                    <a class="nav-link " style="color: rgb(228, 13, 126)" href="{{route('home.cultura')}}"><b>Cultura organizacional</b></a>
                </li>
                <li class="nav-item dropdown ps-3 pt-3" >
                    <a class="nav-link dropdown-toggle" style="color: rgb(158, 170, 178)" href="{{route('home.enterate')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <b>Entérate</b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-dark" href="{{route('home.enterate')}}">Lili Entérate</a>
                        <a class="dropdown-item text-dark" href="{{route('home.cumpleaños')}}">Cumpleaños</a>
                        <a class="dropdown-item text-dark" href="{{route('home.novedad')}}">Novedades</a>
                        <a class="dropdown-item text-dark" href="{{route('home.colaborador')}}">Nuevos colaboradores</a>
                        <a class="dropdown-item text-dark" href="{{route('home.convocatoria')}}">Convocatorias internas</a>
                        <a class="dropdown-item text-dark" href="{{route('home.identidad')}}">Identidad Corporativa</a>
                        
                        {{-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a> --}}
                    </div>
                    




                </li>


                <li class="nav-item dropdown ps-3 pt-3" >
                    <a class="nav-link dropdown-toggle" style="color: rgb(255, 189, 6)" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <b>Directorio</b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-dark" href="{{route('home.administrativo')}}"> Directorio administrativo</a>
                        <a class="dropdown-item text-dark" href="{{route('home.comercial')}}">Directorio comercial</a>
                        {{-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a> --}}
                    </div>
                </li>
                <li class="nav-item dropdown ps-3 pt-3" >
                    <a class="nav-link dropdown-toggle" style="color: rgb(6, 168, 159)" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <b>ENYOI CON LILI</b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-dark" href="{{route('home.enyoiadministrativo')}}">Administrativo</a>
                        <a class="dropdown-item text-dark" href="{{route('home.enyoicedi')}}">CEDI</a>
                        <a class="dropdown-item text-dark" href="{{route('home.enyoicomercial')}}">Comercial</a>
                        <a class="dropdown-item text-dark" href="{{route('home.enyoipermisos')}}">Solicitud de permisos</a>
                        <a class="dropdown-item text-dark" href="{{route('home.enyoiprestamos')}}">Solicitud de préstamo</a>
                        <a class="dropdown-item text-dark" href="{{route('home.enyoibienestar')}}">Política de bienestar</a>

                    </div>
                </li>
                <li class="nav-item dropdown ps-3 pt-3" >
                    <a style="color: rgb(228, 13, 126)" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <b>Políticas y Procesos</b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-dark" href="{{route('home.poli_gerencia_gestion_humana')}}">Gerencia de Gestión Humana</a>
                        <a class="dropdown-item text-dark" href="#">Gerencia Comercial</a>
                        <a class="dropdown-item text-dark" href="#">Gerencia de Expansión y Visual</a>
                        <a class="dropdown-item text-dark" href="#">Gerencia de Mercadeo y Producto</a>
                        <a class="dropdown-item text-dark" href="#">Gerencia de Operaciones</a>
                        <a class="dropdown-item text-dark" href="#">Gerencia Financiera</a>
                    </div>
                </li>
                <li class="nav-item ps-3 pt-3" >
                    <a style="color: rgb(158, 170, 178)" class="nav-link" href="{{route('home.fundacion')}}"><b>Fundación Los Sueños de Lili</b></a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('contenido')

    <div class="container">
        <img src="{{ asset('images/pageindex/RRSS_BANNER copia 26.png') }}" class="d-block w-100"
                        alt="...">
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity=""
        crossorigin="anonymous"></script>
    
    </body>
    </body>
    
    
    </html>