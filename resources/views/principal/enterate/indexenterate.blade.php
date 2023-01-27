@extends('principal.app.app')

@section('contenido')
    <div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-md-8">
                <iframe src="{{ asset('images/LILI ENTÉRATE/LiliEntérate Edición no. 1.pdf') }}" style="width:100%; height:700px;" frameborder="0" frameborder="0"></iframe>
                {{-- <iframe
                    src="https://docs.google.com/gview?url=
http://www.educoas.org/portal/bdigital/contenido/valzacchi/ValzacchiCapitulo-2New.pdf
&embedded=true"
                    style="width:100%; height:700px;" frameborder="0"></iframe> --}}
            </div>
            <div class="col-md-4">
                <h4 class="text-center" style="color: #f18dc7">OTRAS EDICIONES</h4>
                <p class="text-center">Edición NO. 1 - Abril</p>
                <p class="text-center">Edición NO. 2 - Mayo</p>
                <p class="text-center">Edición NO. 3 - Junio</p>
                <p class="text-center">Edición NO. 4 - Julio</p>
                <p class="text-center">Edición NO. 5 - Agosto</p>
                <p class="text-center">Edición NO. 6 - Septiembre</p>
                <p class="text-center">Edición NO. 7 - Octubre</p>
            </div>
        </div>
    </div>
@endsection
