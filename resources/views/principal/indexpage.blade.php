
@extends('principal.app.app')

@section('contenido')
<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/pageindex/banner home_COMERCIAL copia 6.png') }}" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/pageindex/banner home_COMERCIAL copia 7.png') }}" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/pageindex/banner home_COMERCIAL copia 8.png') }}" class="d-block w-100"
                    alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<div class="container pt-4">
    <div id="carouselExampleIndicators2" class="carousel slide carousel-dark" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/pageindex/que encontraras_2 copia 10.png') }}" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/pageindex/que encontraras_2 copia 11.png') }}" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/pageindex/que encontraras_2 copia 9.png') }}" class="d-block w-100"
                    alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators2"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleIndicators2"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden ">Next</span>
        </button>
    </div>
</div>
<div class=" d-flex justify-content-center aling-items-center pt-5 pb-5" style="background-color: #f7f7f7">

    <div class="col-md-10 ">
        <h2 class="text-center" style="color: #e75199">Galeria</h2>
        <div id="carouselExampleIndicators3" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                    class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/pageindex/que encontraras_2 copia 10.png') }}"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/pageindex/que encontraras_2 copia 11.png') }}"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/pageindex/que encontraras_2 copia 9.png') }}"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators3"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleIndicators3"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden ">Next</span>
            </button>
        </div>
    </div>
</div>
 <div class="container pt-5">
        <h1 class="text-center" style="color: #53b6b2">COMUNICADOS <strong>RECIENTES</strong></h1>
        <div class="row">
            <div class="col-md-4">
               
                <img src="{{ asset('images/NOSOTROS/NOSOTROS_marcas.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="col-md-4">
                
                <img src="{{ asset('images/NOSOTROS/NOSOTROS_marcas.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="col-md-4">
                
                <img src="{{ asset('images/NOSOTROS/NOSOTROS_marcas.png') }}" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
<div class="col-md-12">
    <img src="{{ asset('images/pageindex/BANNER_BANNER copia 33.png') }}" class="d-block w-100"
    alt="...">
</div>
@endsection


