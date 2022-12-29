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
    <link href="{{asset('libs/fontawesome/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('libs/sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>
<style>
    .fa-user {
        color: rgb(252,0,126)
    }
    .background-barnav{
        background-color:#000000;
    }
    .background-barnav2{
        background: rgb(232,81,153);
        background: linear-gradient(90deg, rgba(232,81,153,1) 47%, rgba(3,168,162,1) 100%);
    }
    .pad-50{
        padding-top: 20% ;
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
    #content{
        background-color: #fff;
    }
    .container{
        padding-top: 5%;
    }
    table{
        table-layout: fixed;
        font-size: 1rem;
    }
    .miTablaPersonalizada th{
        width: 10vw;
        overflow: auto;
        font-size: 1rem;
    }
    .headt td {
        height:2rem;
    }
    input {
        color: #000000;
        border:none;
        
        border-bottom:3px solid rgb(232,81,153);
    }
    .imagen_portada {
        padding-top: 30rem;
        padding-bottom: calc(10rem - 4.5rem);
        background: url("{{asset('imgs/bg-masthead.jpg')}}");
        /* background: linear-gradient(to bottom, rgba(92, 77, 66, 0.8) 0%, rgba(92, 77, 66, 0.8) 100%), url("../../../../public/imgs/bg-masthead.jpg"); */
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
    .quienes_somos{
        background-color: #0fa3a1}
   
    
</style>
<body id="page-top">
    <div class="navegacion">
        <nav class="navbar navbar-light background-barnav2 fixed-top pt-2 pb-2">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="/"><h1> Talentos Lili&Yoi</h1></a>
                <div class="d-flex">
                    <a class="navbar-brand pr-4 text-light" href="/login">INICIAR SESION</a>
                  
                </div>
            </div>
        </nav>
    </div>
    <div class="div">
        <div class="imagen_portada"></div>
    </div>

    
    
 

            

     
 
   

    <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('libs/sbadmin/js/sb-admin-2.min.js')}}"></script>

</body>
{{-- <script>
    
    $(".nav .nav-link").on("click", function(){
        console.log("hola");
        $(".nav").find(".active").removeClass("active");
        $(this).addClass("active");
    });
</script> --}}
</html>