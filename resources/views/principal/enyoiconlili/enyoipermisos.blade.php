@extends('principal.app.app')

@section('contenido')
    <div class="container pt-5 mt-5 mb-5 pb-5">
        <img src="{{ asset('images/enyoiconlili/solicituddepermisos/1.png') }}" class="d-block w-100" alt="...">
    </div>
    <div class="container d-grid gap-2 col-5 mx-auto pt-5 mt-5 mb-5 pb-5">
        <a class="btn btn-primary btn-block border btn-solicitar" href="#" role="button" style="height: 8vh; border-radius: 50px; background-color: #e771b7;">
            <h2 class="pt-1"> Solicitar permiso</h2>
        </a>
    </div>
@endsection
