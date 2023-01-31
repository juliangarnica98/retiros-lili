@extends('principal.app.app')

@section('contenido')
    <div class="col-md-12">
        <img src="{{ asset('images/Directorio/BANNER_COMERCIAL copia 12.png') }}" class="d-block w-100" alt="...">
    </div>
    <div class="container">
        <div class="col-md-12 pt-5 mt-5  pb-5 mb-5">
            <a href="{{route('home.ggestionhumana')}}" style="text-decoration:none" class="pt-4 mt-4 pb-4 mb-4">
                <h1 class="text-center h1 pt-4 mt-4 pb-4 mb-4" style="color: #ed6dba">GERENCIA <strong>DE GESTIÓN
                        HUMANA</strong></h1>
            </a>
            <hr>
            <a href="{{route('home.gcomercial')}}" style="text-decoration:none" class="pt-4 mt-4 pb-4 mb-4">
                <h1 class="text-center h1 pt-4 mt-4 pb-4 mb-4" style="color: #ed6dba">GERENCIA <strong>COMERCIAL</strong>
                </h1>
            </a>
            <hr>
            <a href="{{route('home.gexpansionyvisual')}}" style="text-decoration:none" class="pt-4 mt-4 pb-4 mb-4">
                <h1 class="text-center h1 pt-4 mt-4 pb-4 mb-4" style="color: #ed6dba">GERENCIA <strong>EXPANSIÓN Y
                        VISUAL</strong></h1>
            </a>
            <hr>
            <a href="{{route('home.gmercadeo')}}" style="text-decoration:none" class="pt-4 mt-4 pb-4 mb-4">
                <h1 class="text-center h1 pt-4 mt-4 pb-4 mb-4" style="color: #ed6dba">GERENCIA <strong>MERCADEO Y
                        PRODUCTO</strong></h1>
            </a>
            <hr>
            <a href="{{route('home.goperaciones')}}" style="text-decoration:none" class="pt-4 mt-4 pb-4 mb-4">
                <h1 class="text-center h1 pt-4 mt-4 pb-4 mb-4" style="color: #ed6dba">GERENCIA <strong>DE
                        OPERACIONES</strong></h1>
            </a>
            <hr>
            <a href="{{route('home.gfinanciera')}}" style="text-decoration:none" class="pt-4 mt-4 pb-4 mb-4">
                <h1 class="text-center h1 pt-4 mt-4 pb-4 mb-4" style="color: #ed6dba">GERENCIA <strong>FINANCIERA</strong>
                </h1>
            </a>
            <hr>
            <a href="{{route('home.djuridica')}}" style="text-decoration:none" class="pt-4 mt-4 pb-4 mb-4">
                <h1 class="text-center h1 pt-4 mt-4 pb-4 mb-4" style="color: #ed6dba">DIRECCIÓN <strong>JURÍDICA</strong>
                </h1>
            </a>
            <hr>
            <a href="{{route('home.uniq')}}" style="text-decoration:none" class="pt-4 mt-4 pb-4 mb-4">
                <h1 class="text-center h1 pt-4 mt-4 pb-4 mb-4" style="color: #ed6dba">UNIQ <strong>CONDOMS</strong></h1>
            </a>
        </div>
    </div>
@endsection
