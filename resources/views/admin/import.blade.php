@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h1 class="text-center">Importa mis colaboradores</h1>
            <div class="card">
                <div class="card-header">Seleccione un archivo excel</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
                    <form action="{{route('admin.import.collaborator')}}" method="post" enctype="multipart/form-data">
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
                        <select class="form-select form-select-lg form-control" aria-label=".form-select-lg example" name="jefe">
                           @foreach ($jefes as $jefe)
                           <option value="{{$jefe->id}}">{{$jefe->name}}</option>
                           @endforeach                        
                        </select>
                        
                        <hr class="sidebar-divider">

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
                        <button class="d-none d-sm-inline-block btn btn-block shadow-sm" style="background-color: #269aa0;color:#fff">Importar colaboradores</button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
