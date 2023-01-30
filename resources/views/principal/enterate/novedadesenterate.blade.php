@extends('principal.app.app')

@section('contenido')
    <div class="container pt-5 mt-5 mb-5 pb-5">
        <h1 class="text-center" style="color: #e75199"><strong> NOVEDADES</strong></h1>
        <div class="row">
            <div class="col-md-6 pt-5">
                <img width="100%" src="{{asset('images/LILI ENTÉRATE/novedad1.jpeg')}}" alt="">
                

            </div>
            <div class="col-md-6 pt-5">
                
                <img width="100%" src="{{asset('images/LILI ENTÉRATE/novedad2.jpeg')}}" alt="">

            </div>
          
        </div>
    </div>
@endsection
