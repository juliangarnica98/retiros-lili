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



    <div class="page-content page-container" id="page-content">
        <div class="">
            <div class="row pl-3 pr-3 pt-3">
            
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total vacantes
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Vacantes abiertas
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Vacantes cerradas
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
        </div>
            <div class="row pl-3 pr-3 pt-3 justify-content-center">
                <div class="col-md-12 grid-margin stretch-card">
                    
                    <div class="card" style="background-color: #ebebeb;">
                        <div class="card-body">
                            <h1 class="card-title">Nuevos Aspirantes</h1>
                            <p class="card-description">
                                <a href="{{ url('administrador/exporttable/') }}" class="d-none d-sm-inline-block btn btn-sm  shadow-sm"
                                style="background-color:  #17a0a1; color:#fff"><i class="fas fa-download fa-sm "></i> Generar reporte</a>
                            </p>

                            <table class="table table-responsive " style="background-color: #FFF; border-radius: 10px;">
                                <thead>
                                    <tr class="d-flex">
                                        <th class="col-1 text-center">Fecha de retiro</th>
                                        <th class="col-1 text-center">Nombre del colaborador</th>
                                        <th class="col-1 text-center">Encargado del retiro</th>
                                        <th class="col-1 text-center">documento del colaborador</th>
                                        <th class="col-1 text-center">Desempeño</th>
                                        <th class="col-1 text-center">Tipo de retiro</th>
                                        <th class="col-1 text-center">Ultimo dia laborado</th>
                                        <th class="col-1 text-center">dinero pendiente</th>
                                        <th class="col-1 text-center">cantidad dinero pendiente</th>
                                        <th class="col-1 text-center">concepto de dinero pendiente</th>
                                        <th class="col-1 text-center">fecha novedad 1</th>
                                        <th class="col-1 text-center">fecha novedad 2</th>
                                        <th class="col-1 text-center">fecha novedad 3</th>
                                        <th class="col-1 text-center">fecha novedad 4</th>
                                        <th class="col-1 text-center">fecha novedad 5</th>
                                        <th class="col-1 text-center">fecha dominical 1</th>
                                        <th class="col-1 text-center">fecha dominical 2</th>
                                        <th class="col-1 text-center">fecha dominical 3</th>
                                        <th class="col-1 text-center">fecha dominical 4</th>
                                        <th class="col-1 text-center">fecha dominical 5</th>
                                        <th style=" width: 25vw;" class="col-1 text-center">Entrega <strong>Perfil de
                                                tienda</strong></th>
                                        <th style=" width: 25vw;" class="col-1 text-center">Entrega <strong>Administrador</strong>
                                        </th>
                                        <th style=" width: 25vw;" class="col-1 text-center">Entrega <strong>Cedi</strong></th>
                                        <th class="col-1 text-center">Equipo celular</th>
                                        <th class="col-1 text-center">Acta de entrega</th>
                                        <th class="col-1 text-center">Carta de renuncia</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($retiros as $retiro)
                                        <tr class="d-flex" style="padding-bottom: 10px;">
                                            <td class="col-1 text-center">{{ date('d-m-Y', strtotime($retiro->created_at)) }}</td>
                                            <td class="col-1 text-center">{{ $retiro->name_collaborator }}</td>

                                            <td class="col-1 text-center">{{ $retiro->user_id }}</td>
                                            <td class="col-1 text-center">{{ $retiro->document_collaborator }}</td>
                                            <td class="col-1 text-center">{{ $retiro->performance }}</td>
                                            @foreach ($tipo_retiro as $typo)
                                                @if ($retiro->type_retirement_id == $typo->id)
                                                    <td class="col-1">{{ $typo->description }}</td>
                                                @endif
                                            @endforeach
                                            <td class="col-1 text-center">{{ $retiro->last_day }}</td>
                                            <th class="col-1 text-center">{{ $retiro->money_pend }}</th>
                                            <td class="col-1 text-center">{{ $retiro->money_amou }}</td>
                                            <td class="col-1 text-center">{{ $retiro->money_conc }}</td>
                                            <td class="col-1 text-center">{{ $retiro->date_1 }}</td>
                                            <td class="col-1 text-center">{{ $retiro->date_2 }}</td>
                                            <th class="col-1 text-center">{{ $retiro->date_3 }}</th>
                                            <td class="col-1 text-center">{{ $retiro->date_4 }}</td>
                                            <td class="col-1 text-center">{{ $retiro->date_5 }}</td>
                                            <td class="col-1 text-center">{{ $retiro->date_d_1 }}</td>
                                            <td class="col-1 text-center">{{ $retiro->date_d_2 }}</td>
                                            <th class="col-1 text-center">{{ $retiro->date_d_3 }}</th>
                                            <td class="col-1 text-center">{{ $retiro->date_d_4 }}</td>
                                            <td class="col-1 text-center">{{ $retiro->date_d_5 }}</td>

                                            <td class="col-1 text-center">{{ $retiro->store_ent }}</td>
                                            <td class="col-1 text-center">{{ $retiro->admin_ent }}</td>
                                            <td class="col-1 text-center">{{ $retiro->cedi_ent }}</td>
                                            <td class="col-1 text-center">{{ $retiro->cell }}</td>
                                            <td class="col-1 text-center">{{ $retiro->delivery_certificate }}</td>
                                            <td class="col-1 text-center">{{ $retiro->letter }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

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
    <script>
        function doSearch() {
            const tableReg = document.getElementById('datos');
            const searchText = document.getElementById('searchTerm').value.toLowerCase();
            let total = 0;
            for (let i = 1; i < tableReg.rows.length; i++) {
                if (tableReg.rows[i].classList.contains("noSearch")) {
                    continue;
                }
                let found = false;
                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                for (let j = 0; j < cellsOfRow.length && !found; j++) {
                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                        found = true;
                        total++;
                    }
                }
                if (found) {
                    tableReg.rows[i].style.display = '';
                } else {
                    tableReg.rows[i].style.display = 'none';
                }
            }
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
