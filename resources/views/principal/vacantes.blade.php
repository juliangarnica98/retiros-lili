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

    <!-- Custom fonts for this template-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('libs/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('libs/sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>
<style>
    .fa-user {
        color: rgb(252, 0, 126)
    }

    .background-barnav {
        background-color: #000000;
    }

    .background-barnav2 {
        background: rgb(232, 81, 153);
        background: linear-gradient(90deg, rgba(232, 81, 153, 1) 47%, rgba(3, 168, 162, 1) 100%);
    }

    .pad-50 {
        padding-top: 20%;
    }

    .scroll {
        max-height: 60vh;
        overflow-y: auto;
    }

    *::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    *::-webkit-scrollbar-track {
        background: #e85199;
    }

    *::-webkit-scrollbar-thumb {
        background-color: #0aa5a2;
        border-radius: 20px;
        border: 3px solid transparent;
    }

    #content {
        background-color: #fff;
    }

    .container {
        padding-top: 5%;
    }

    table {
        table-layout: fixed;
        font-size: 1rem;
    }

    .miTablaPersonalizada th {
        width: 10vw;
        overflow: auto;
        font-size: 1rem;
    }

    .headt td {
        height: 2rem;
    }

    input {
        color: #000000;
        border: none;

        border-bottom: 3px solid rgb(232, 81, 153);
    }

    .imagen_portada {
        padding-top: 30rem;
        padding-bottom: calc(10rem - 4.5rem);
        background: linear-gradient(to bottom, rgba(92, 77, 66, 0.8) 0%, rgba(92, 77, 66, 0.8) 100%), url("{{ asset('imgs/work.jpg') }}");
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover;
    }

    .imagen_portada h1 {
        font-size: 2.25rem;
    }

    @media (min-width: 992px) {
        .imagen_portada {
            height: 100vh;
            min-height: 40rem;
            padding-top: 15rem;
            padding-bottom: 0;
        }

        .imagen_portada h1 {
            font-size: 3rem;
        }
    }

    @media (min-width: 1200px) {
        .imagen_portada h1 {
            font-size: 3.5rem;
        }
    }

    .quienes_somos {
        background-color: #0fa3a1
    }
</style>

<body id="page-top">
    <div class="navegacion">
        <nav class="navbar navbar-expand-lg navbar-light background-barnav2">
            <a class="navbar-brand text-light" href="/">
                <h1> Talentos Lili&Yoi</h1>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse mr-auto justify-content-end align-items-right"
                id="navbarSupportedContent">
                <ul class="navbar-nav">


                    <li class="nav-item"> <a class="navbar-brand  text-light nav-link" href="/login">Iniciar sesion</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
    <div class="div">
        <div class="imagen_portada">
            <div class="container" style="background-color: #000000">
                <div class="row">
                    <select class="form-select form-control col-md-4 ">
                        <option selected>Centros de distribución</option>
                        <option value="1">Auxiliar de centro de distribución (Bogotá cll 196 con auto norte)
                        </option>
                        <option value="2">Auxiliar de centro de distribución (Siberia parque siemens)</option>
                    </select>
                    <select class="form-select form-control col-md-4 ">
                        <option selected>Tiendas</option>
                        <option value="1">Asesor de ventas ( Tiendas a nivel nacional)</option>
                        <option value="2">Mercaderista (Canal tradicional y grandes superficial a nivel nal)</option>
                        <option value="3">Auxiliar integral (Bodegas de nuestras tiendas a nivel nacional)</option>
                        <option value="4">Lider de tienda  (Tiendas a nivel nacional)</option>
                    </select>
                    <select class="form-select form-control col-md-4 ">
                        <option selected>Administrativos</option>
                        <option value="1">Jefe de selección (Bogotá)</option>
                        <option value="2">Analista de selección (Bogotá)</option>

                        <option value="3">Especialista de comunicaciones (Bogotá)</option>
                        <option value="4">Analista de contabilidad (Bogota)</option>
                        <option value="5">Analista de finanzas (Bogotá)</option>
                        <option value="6">Auxiliar Administrativo (Bogotá)</option>
                        <option value="7">Auxiliar de inventario (Bogotá)</option>
                        <option value="8">Manager comercial (Bogotá)</option>
                        <option value="9">Coordinador de CRM</option>
                        <option value="10">Desarrollador de aplicaciones</option>
                        <option value="11">Auxiliar de Visual Merchandising (Ibagué- Santamarta)</option>
                        <option value="12">Coordinador de planeación (Bogotá)</option>

                        <option value="13">Analista de selección y formación (Siberia)</option>
                        <option value="14">Fotógrafo (Bogotá)</option>
                        <option value="15">Auxiliar de contabilidad (Bogotá)</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <footer class="text-center text-white" style="background-color: #212529">
            <!-- Grid container -->
            <div class="container pt-4">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-link btn-floating btn-lg text-light m-1" href="#!" role="button"
                        data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-link btn-floating btn-lg text-light m-1" href="#!" role="button"
                        data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-link btn-floating btn-lg text-light m-1" href="#!" role="button"
                        data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-link btn-floating btn-lg text-light m-1" href="#!" role="button"
                        data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-link btn-floating btn-lg text-light m-1" href="#!" role="button"
                        data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
                    <!-- Github -->
                    <a class="btn btn-link btn-floating btn-lg text-light m-1" href="#!" role="button"
                        data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center text-light p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2022 Copyright:
                <a class="text-light" href="https://www.lilipink.com/">lilipink.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>


    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/sbadmin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
