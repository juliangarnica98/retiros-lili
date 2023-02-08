@extends('layouts.admin')
<style>
    body {
        background-color: #f9f9fa
    }

    .flex {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto
    }

    @media (max-width:991.98px) {
        .padding {
            padding: 1.2rem
        }
    }

    @media (max-width:767.98px) {
        .padding {
            padding: 1.2rem
        }
    }

    .padding {
        padding: 1.2rem
    }

    .card {
        box-shadow: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -ms-box-shadow: none
    }

    .pl-3,
    .px-3 {
        padding-left: 1rem !important
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid #d2d2dc;
        border-radius: 0
    }

    .card .card-title {
        color: #000000;
        margin-bottom: 0.625rem;
        text-transform: capitalize;
        font-size: 1.5rem;
        font-weight: 500;
    }

    .card .card-description {
        margin-bottom: 1rem;
        font-weight: 400;
        color: #000000;
    }

    p {
        font-size: 1rem;
        margin-bottom: .5rem;
        line-height: 1.5rem;
    }
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }

    .table thead th {
        border-top: 0;
        border-bottom-width: 1.5px;
        font-weight: 500;
        font-size: 0.9rem;
        text-transform: uppercase;
    }

    .table td {
        font-size: 0.9rem;
    }
    input[type=file]::file-selector-button {
        margin-right: 20px;
        border: none;
        background: #ba639b;
        padding: 10px 20px;
        border-radius: 10px;
        color: #000;
        cursor: pointer;
        transition: background .2s ease-in-out;
        display: none;
    }

    input[type=file]::file-selector-button:hover {
        background: #e85199;
        display: none;
    }

    .input_file {
        margin-right: 20px;
        border: none;
        padding: 10px 20px;
        border-radius: 25px;
        color: #000;
        cursor: pointer;
        background: #e85199;
        transition: background .2s ease-in-out;
    }

    .input_file:hover {
        background: #bebabd;
    }
</style>
@section('content')
    @if (Session::has('error'))
        <script>
            Swal.fire(
                'Error al importar archivo',
                "{{ Session::get('error') }}",
                'error'
            )
        </script>
    @endif
    @if (Session::has('message'))
        <script>
            Swal.fire(
                '¡Bien hecho!',
                "{{ Session::get('message') }}",
                'success'
            )
        </script>
    @endif
    <div class="page-content page-container" id="page-content">
        <div class="">

            <div class="row pl-3 pr-3 pt-3 justify-content-center">
                <div class="col-md-9 grid-margin stretch-card">

                    <div class="card" style="background-color: #ebebeb;">
                        <div class="card-body">
                            <h1 class="card-title">Colaboradores</h1>
                            <p class="card-description">
                                {{-- <a href="{{ url('administrador/exporttable/') }}"
                                    class="d-none d-sm-inline-block btn btn-sm  shadow-sm"
                                    style="background-color:  #17a0a1; color:#fff"><i class="fas fa-download fa-sm "></i>
                                    Generar reporte</a> --}}
                            </p>
                            @if (count($collaborators) == 0)
                                No se han importado colaboradores
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover" style="background-color: #FFF; border-radius: 10px;">
                                        <thead>
                                            <tr>
                                                <th scope="col " class="text-center">Nombre </th>
                                                <th scope="col " class="text-center">Documento </th>
                                                <th scope="col " class="text-center">Estado </th>
                                                <th scope="col " class="text-center">Jefe </th>
                                                <th scope="col " class="text-center">Cargo </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($collaborators as $collaborator)
                                                <tr>
                                                    <td class="text-center">{{ $collaborator->name }}</td>
                                                    <td class="text-center">{{ $collaborator->document }}</td>
                                                    <td class="text-center">
                                                        @if ($collaborator->state == 1)
                                                            ACTIVO
                                                        @else
                                                            INACTIVO
                                                        @endif    
                                                    </td>   
                                                    @foreach ($jefes as $jefe)
                                                        @if ($collaborator->user_id == $jefe->email)
                                                            <td class="text-center">{{ $jefe->name }}</td>
                                                        @endif
                                                    @endforeach
                                                    @foreach ($cargos as $cargo)
                                                        @if ($collaborator->position_id== $cargo->id)
                                                            <td class="text-center">{{ $cargo->description }}</td>
                                                        @endif
                                                    @endforeach                                            
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                
                                    
                                </div>
                            @endif
                            
                        </div>
                        <div class="container pt-3">
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 text-xs-center">
                                    {{ $collaborators->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card pt-5">
                    <div class="card" style="background-color: #ebebeb;">
                        <div class="card-body">
                            <h1 class="card-title">Importar Colaboradores</h1>
                            <form action="{{ route('admin.import.collaborator') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="file">
                                    Selecciona un archivo
                                    <input type="file" name="file" class="input_file"
                                        style="border-bottom: none;width:100%; color:#fff" multiple>
                                </div>
                                <hr class="sidebar-divider">
                                <button class="d-none d-sm-inline-block btn btn-block shadow-sm"
                                    style="background-color: #269aa0;color:#fff ; border-radius: 25px">Importar</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection