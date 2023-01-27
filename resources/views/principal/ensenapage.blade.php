@extends('principal.app.app')

@section('contenido')
    <div class="col-md-12">
        <img src="{{ asset('images/LILI TE ENSEÑA/BANNER_LILI TE ENSEÑA.png') }}" class="d-block w-100" alt="...">
    </div>
    <div class="container pt-5">
        <img src="{{ asset('images/LILI TE ENSEÑA/BOTONones y banner_1 copia 3.png') }}" class="d-block w-100" alt="...">
    </div>
    <div class="container pt-5 d-flex justify-content-center">

        <section id="sect1" class="sect">
            <video src="https://carontestudio.com/img/f4.mp4" width="800wh" autoplay="true" muted="true" loop="true"
                poster="https://carontestudio.com/img/contacto.jpg"></video>
            
        </section>
    </div>
    <div class="container pt-5 pb-5 mb-5">
        <p class="h5 text-center">Selecciona la marca a la que peteneces para ingresar a Lili Te enseña</p>
    </div>
    <div class="container pt-5 pb-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <a href="#"><img src="{{ asset('images/LILI TE ENSEÑA/BOTONones y banner_1 copia 4.png') }}"
                        class="d-block w-100" alt="..."></a>
            </div>
            <div class="col-md-4">
                <a href="#"><img src="{{ asset('images/LILI TE ENSEÑA/BOTONones y banner_1 copia 5.png') }}"
                        class="d-block w-100" alt="..."></a>
            </div>
            <div class="col-md-4">
                <a href="#"><img src="{{ asset('images/LILI TE ENSEÑA/BOTON L_Y_L_Y.png') }}" class="d-block w-100"
                        alt="..."></a>
            </div>
        </div>
    </div>
@endsection
