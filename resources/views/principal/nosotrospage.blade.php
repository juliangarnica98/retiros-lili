@extends('principal.app.app')

@section('contenido')
    <div class="col-md-12">
        <img src="{{ asset('images/NOSOTROS/NOSOTROS_COMERCIAL copia.png') }}" class="d-block w-100" alt="...">
    </div>
    <div class="container pt-5">
        <h1 class="text-center" style="color: #53b6b2">NUESTROS <strong>GERENTES</strong></h1>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/NOSOTROS/gerente1.jpeg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/NOSOTROS/gerente2.jpeg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-md-6">
                <img src="{{ asset('images/NOSOTROS/gerente3.jpeg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/NOSOTROS/gerente4.jpeg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-md-6">
                <img src="{{ asset('images/NOSOTROS/gerente5.jpeg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/NOSOTROS/gerente6.jpeg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <div class="row justify-content-center pt-4">
            <div class="col-md-6">
                <img src="{{ asset('images/NOSOTROS/gerente7.jpeg') }}" class="d-block w-100" alt="...">
            </div>
            
        </div>
    </div>
    <div class="container pt-5">
        <h1 class="text-center" style="color: #ed6fba">NUESTRA <strong>HISTORIA</strong></h1>
        <div class="col-md-12">
            <img src="{{ asset('images/NOSOTROS/historia.png') }}" class="d-block w-100"
                alt="...">
        </div>
    </div>
    <div class="container pt-5">
        <h1 class="text-center" style="color: #53b6b2">NUESTRAS <strong>MARCAS</strong></h1>
        <div class="col-md-12">
            <img src="{{ asset('images/NOSOTROS/nuestras marcas.jpeg') }}" class="d-block w-100" alt="...">
        </div>
    </div>
    <div class="container pt-5">
        <div class="col-md-12">
            <img src="{{ asset('images/NOSOTROS/NOSOTROS_BANNER copia 10.png') }}" class="d-block w-100" alt="...">
        </div>
    </div>
    <div class="container pt-2">
        {{-- <h1 class="text-center h1 pt-4" style="color: #ed6fba"> PLANEACIÓN <strong>ESTRATÉGICA</strong></h1> --}}
        <div class="col-md-12">
            <img src="{{ asset('images/NOSOTROS/objetivos.jpeg') }}" class="d-block w-100" alt="...">
        </div>
    </div>
    <div class="container pt-5">
        {{-- <h1 class="text-center h1 pt-4" style="color: #ed6fba"> PLANEACIÓN <strong>ESTRATÉGICA</strong></h1> --}}
        <div class="col-md-12">
            <img src="{{ asset('images/NOSOTROS/GH_BANNER copia 18.png ') }}" class="d-block w-100" alt="...">
        </div>
    </div>

@endsection
