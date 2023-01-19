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



    .table,
    .jsgrid .jsgrid-table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }

    .table thead th,
    .jsgrid .jsgrid-table thead th {
        border-top: 0;
        border-bottom-width: 1.5px;
        font-weight: 500;
        font-size: 0.8rem;
        text-transform: uppercase;
    }

    .table td,
    .jsgrid .jsgrid-table td {
        font-size: 0.9rem;

    }

    .badge {
        border-radius: 0;
        font-size: 1rem;
        line-height: 1;
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
    <div class="container pt-4">
        
        <div class="row pl-3 pr-3 pt-3 justify-content-center">
            <div class="col-md-12 grid-margin stretch-card">

                <div class="card" style="background-color: #ebebeb;">
                    <div class="card-body">
                        <h1 class="card-title">Retiros</h1>
                        <p class="card-description">
                            <a href="{{ url('jefe/exporttable/' . $usuario) }}" class="d-none d-sm-inline-block btn btn-sm  shadow-sm"
                            style="background-color:  #17a0a1; color:#fff"><i class="fas fa-download fa-sm "></i> Generar reporte</a>
                        </p>
                        {{-- @if (is_null($retiros))
                            <p class="text-center">No hay retiros registrados</p>
                        @else --}}
                        <table class="table table-responsive " style="background-color: #FFF; border-radius: 10px;">
                            <thead>
                                <tr class="d-flex ">
                                    <th class="col text-center">Fecha </th>
                                    <th class="col-4 text-center">Nombre </th>
                                  
                                    <th class="col text-center">Documento </th>
                                    <th class="col text-center">Tipo de retiro</th>
                                    <th class="col text-center">Ultimo dia</th>
                                    <th class="col text-center">Desempeño</th>
                                   
                                    <th class="col text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($retiros as $retiro)
                                    <tr class="d-flex" style="padding-bottom: 10px;">
                                        <td class="col text-center">
                                            {{ date('d-m-Y', strtotime($retiro->created_at)) }}</td>
                                        <td class="col-4 text-center">{{ $retiro->name_collaborator }}</td>
                                      
                                        <td class="col text-center">{{ $retiro->document_collaborator }}</td>

                                        @foreach ($tipo_retiro as $typo)
                                            @if ($retiro->type_retirement_id == $typo->id)
                                                <td class="col text-center">{{ $typo->description }}</td>
                                            @endif
                                        @endforeach
                                        <td class="col text-center">{{ $retiro->last_day }}</td>
                                        <td class="col text-center">{{ $retiro->performance }}</td>
                                        
                                        <td class="col text-center">
                                            <div style="display: flex" class="text-center justify-content-center">
                                                <div class="pl-1">
                                                    <button class="btn btn-warning"
                                                        data-target="#Modalve{{ $retiro->id }}"
                                                        data-toggle="modal"><i class="fas fa-eye"></i></button>
                                                    
                                                </div>
                                            </div>
                                            @include('boss.retirement.showretiros')
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- @endif --}}

                    </div>
                    <div class="container pt-3">
                        <div class="row d-flex justify-content-center ">
                            <div class="col-12 text-xs-center">
                                {{ $retiros->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <script>
        function doSearch()

        {

            const tableReg = document.getElementById('datos-jefe');

            const searchText = document.getElementById('searchTerm').value.toLowerCase();

            let total = 0;



            // Recorremos todas las filas con contenido de la tabla

            for (let i = 1; i < tableReg.rows.length; i++) {

                // Si el td tiene la clase "noSearch" no se busca en su cntenido

                if (tableReg.rows[i].classList.contains("noSearch")) {

                    continue;

                }



                let found = false;

                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');

                // Recorremos todas las celdas

                for (let j = 0; j < cellsOfRow.length && !found; j++) {

                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();

                    // Buscamos el texto en el contenido de la celda

                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {

                        found = true;

                        total++;

                    }

                }

                if (found) {

                    tableReg.rows[i].style.display = '';

                } else {

                    // si no ha encontrado ninguna coincidencia, esconde la

                    // fila de la tabla

                    tableReg.rows[i].style.display = 'none';

                }

            }



            // mostramos las coincidencias

            const lastTR = tableReg.rows[tableReg.rows.length - 1];

            const td = document.querySelector("#search");

            lastTR.classList.remove("hide", "red");

            if (searchText == "") {

                lastTR.classList.add("hide");

            } else if (total) {

                td.innerHTML = "Se ha encontrado " + total + " coincidencia" + ((total > 1) ? "s" : "");

            } else {

                lastTR.classList.add("red");

                td.innerHTML = "No se han encontrado coincidencias";

            }

        }
    </script>
@endsection