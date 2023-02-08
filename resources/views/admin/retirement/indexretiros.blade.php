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
                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card" style="background-color: #ebebeb;">
                        <div class="card-body">
                            <h1 class="card-title">Retiros</h1>
                            <p class="card-description">
                                <a href="{{ url('administrador/exporttable/') }}"
                                    class="d-none d-sm-inline-block btn btn-sm  shadow-sm"
                                    style="background-color:  #17a0a1; color:#fff"><i class="fas fa-download fa-sm "></i>
                                    Generar reporte</a>
                            </p>
                            <div class="table-responsive">
                                @if(count($retiros) != 0)
                                    <table class="table table-hover" style="background-color: #FFF; border-radius: 10px;">
                                        <thead>
                                            <tr>
                                                <th scope="col " class="text-center">Fecha </th>
                                                <th scope="col " class="text-center">Nombre </th>
                                                <th scope="col " class="text-center">Encargado </th>
                                                <th scope="col " class="text-center">Documento </th>
                                                <th scope="col " class="text-center">Tipo de retiro</th>
                                                <th scope="col " class="text-center">Ultimo dia</th>
                                                <th scope="col " class="text-center">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($retiros as $retiro)
                                                <tr>
                                                    <td scope="row" class="text-center">
                                                        {{ date('d-m-Y', strtotime($retiro->created_at)) }}</td>
                                                    <td class="text-center">{{ $retiro->name_collaborator }}</td>
                                                    <td class="text-center">{{ $retiro->user_id }}</td>
                                                    <td class="text-center">{{ $retiro->document_collaborator }}</td>
        
                                                    @foreach ($tipo_retiro as $typo)
                                                        @if ($retiro->type_retirement_id == $typo->id)
                                                            <td class="text-center">{{ $typo->description }}</td>
                                                        @endif
                                                    @endforeach
                                                    <td class="text-center">{{ $retiro->last_day }}</td>
        
                                                    <td class="text-center">
                                                        <div style="display: flex" class="text-center justify-content-center">
                                                            <div class="pl-1">
                                                                <button class="btn btn-warning"
                                                                    data-target="#Modalver{{ $retiro->id }}"
                                                                    data-toggle="modal"><i class="fas fa-eye"></i></button>
        
                                                            </div>
                                                        </div>
                                                        @include('admin.retirement.showretiros')
                                                    </td>
        
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    No hay retiros registrados
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container pt-3">
        <div class="row d-flex justify-content-center">
            <div class="col-12 text-xs-center">
                {{ $retiros->links() }}
            </div>
        </div>
    </div>
 
@endsection
