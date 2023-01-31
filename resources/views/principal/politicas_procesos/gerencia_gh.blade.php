@extends('principal.app.app')

@section('contenido')
<div class="container pt-5 mt-5">
    <img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/1.png') }}" class="d-block w-100" alt="...">
</div>
<div class="container pt-5 mt-5 pb-4">
    <h1 class="text-center" style="color: #56bab7"><strong>POLITICAS</strong></h1>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="#"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/2.png') }}" class="d-block w-100" alt="..."></a>
        </div>
        <div class="col">
            <a href="#"> <img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/3.png') }}" class="d-block w-100" alt="..."></a>
        </div>
        <div class="col">
            <a href="#"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/4.png') }}" class="d-block w-100" alt="..."></a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="#"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/5.png') }}" class="d-block w-100" alt="..."></a>
        </div>
        <div class="col">
            {{-- <img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/3.png') }}" class="d-block w-100" alt="..."> --}}
        </div>
        <div class="col">
            {{-- <img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/4.png') }}" class="d-block w-100" alt="..."> --}}
        </div>
    </div>
</div>
<div class="container pt-5 mt-5 pb-4">
    <h1 class="text-center" style="color: #56bab7">PROCESOS Y <strong>FORMULARIOS</strong></h1>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="http://sucursalvirtual.com.co/"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/6.png') }}" class="d-block w-100" alt="..."></a>
        </div>
        <div class="col">
            <a href="#"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/7.png') }}" class="d-block w-100" alt="..."></a>
        </div>
        <div class="col">
            <a href="{{route('login')}}"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/8.png') }}" class="d-block w-100" alt="..."></a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="#"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/9.png') }}" class="d-block w-100" alt="..."></a>
        </div>
        <div class="col">
            <a href="#"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/10.png') }}" class="d-block w-100" alt="..."></a>
        </div>
        <div class="col">
            <a href="#"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/11.png') }}" class="d-block w-100" alt="..."></a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="https://grupo-alianza.com/site/index.html"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/12.png') }}" class="d-block w-100" alt="..."></a>
        </div>
        <div class="col">
            <a href="https://apps.genialw.com/SitioTrabajador/inicio.xhtml"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/13.png') }}" class="d-block w-100" alt="..."></a>
        </div>
        <div class="col">
            <a href="#"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/14.png') }}" class="d-block w-100" alt="..."></a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="#"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/15.png') }}" class="d-block w-100" alt="..."></a>
        </div>
        <div class="col">
            <a href="#"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/16.png') }}" class="d-block w-100" alt="..."></a>
        </div>
        <div class="col">
            <a href="#"><img src="{{ asset('images/politicas_procesos/gerencia_gestionhumana/17.png') }}" class="d-block w-100" alt="..."></a>
        </div>
    </div>
</div>
@endsection