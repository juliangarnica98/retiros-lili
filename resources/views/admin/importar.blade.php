@extends('layouts.admin')
<style>
    .custom-file-input ~ .custom-file-label::after {
    content: "Elegir";
}
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h1 class="text-center">Importa los jefes</h1>
            <div class="card">
                <div class="card-header">Seleccione un archivo excel</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    {{ __('You are logged in!') }} --}}
                     @csrf
                        @if(Session::has('error'))
                        <script>
                            Swal.fire(
                            'Error al importar archivo',
                            "{{Session::get('error')}}",
                            'error'
                            )
                        </script>
                        @endif
                    <form action="{{route('admin.import.excel')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(Session::has('message'))
                        <script>
                            Swal.fire(
                            '¡Bien hecho!',
                            "{{Session::get('message')}}",
                            'success'
                            )
                        </script>
                            {{-- <p>{{Session::get('message')}}</p> --}}
                        @endif
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01">Archivo</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="" name="file"
                                aria-describedby="" lang="es">
                              <label class="custom-file-label" >Escoge un archivo</label>
                            </div>
                          </div>
                          <hr class="sidebar-divider">
                        <button class="d-none d-sm-inline-block btn btn-block shadow-sm" style="background-color: #269aa0;color:#fff">Importar jefes</button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
