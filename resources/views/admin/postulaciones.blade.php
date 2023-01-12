@extends('layouts.admin')

@section('content')
    <div class="container pt-4 pl-2 pr-2">
        <div class="row justify-content-center">
            <div class="col-md-12">


                {{-- <a href="{{ url('administrador/exporttable/')}}" class="d-none d-sm-inline-block btn btn-sm  shadow-sm" style="background-color:  #17a0a1; color:#fff"><i
                class="fas fa-download fa-sm "></i> Generar reporte</a> --}}

                <h1> Postulaciones</h1>
                <hr class="sidebar-divider">
                <div class="card mt-3">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="table-responsive" style="color: #fff">
                                <table class="table table-responsive stacktable" id="tablaretiros">
                                    <thead>
                                        <tr class="d-flex">
                                            <th class="col-1">Fecha de postulación</th>
                                            <th class="col-1">Nombre</th>
                                            <th class="col-1">Tipo de documento</th>
                                            <th class="col-1">Numero de documento</th>
                                            <th class="col-1">Número de celular</th>
                                            <th class="col-1">Número de celular opcional</th>
                                            <th class="col-1">Edad</th>
                                            <th class="col-1">Correo</th>
                                            <th class="col-1">Dirección</th>
                                            <th class="col-1">Ciudad de residencia</th>
                                            <th class="col-1">Perfil academico culminado</th>
                                            <th class="col-1">Nombre ultima empresa</th>
                                            <th class="col-1">Cargo</th>
                                            <th class="col-1">Funciones</th>
                                            <th class="col-1">Actualmente trabaja</th>
                                            <th class="col-1">Fecha inicio</th>
                                            <th class="col-1">Fecha fin</th>
                                            <th class="col-1">Nombre penultima empresa</th>
                                            <th class="col-1">Cargo</th>
                                            <th class="col-1">Funciones</th>
                                            <th class="col-1">Fecha inicio</th>
                                            <th class="col-1">Fecha fin</th>
                                            <th class="col-1">Tiene familia </th>
                                            <th class="col-1">Por que le gustaria trabajar</th>
                                            <th class="col-1">Anteiormente habia trabajado </th>
                                            <th class="col-1">Por que deberiamos escogerlo</th>
                                            <th class="col-1">Talla de camisa</th>
                                            <th class="col-1">Talla pantalón</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($cvs as $cv)
                                            <tr class="d-flex">
                                                <td class="col-1">{{ date('d-m-Y', strtotime($cv->created_at)) }}</td>
                                                <td class="col-1">{{ $cv->name }}</td>
                                                <td class="col-1">{{ $cv->type_id }}</td>
                                                <th class="col-1">{{ $cv->num_id }}</th>
                                                <td class="col-1">{{ $cv->num_cell }}</td>
                                                <td class="col-1">{{ $cv->num_cell2 }}</td>
                                                <td class="col-1">{{ $cv->age }}</td>
                                                <td class="col-1">{{ $cv->email }}</td>
                                                <th class="col-1">{{ $cv->address }}</th>
                                                <td class="col-1">{{ $cv->city_address }}</td>
                                                <td class="col-1">{{ $cv->academic_profile }}</td>

                                                <td class="col-1">{{ $cv->name_last_company }}</td>
                                                <td class="col-1">{{ $cv->position_last_company }}</td>
                                                <th class="col-1">{{ $cv->funtion_last_company }}</th>
                                                <td class="col-1">{{ $cv->work_last_company }}</td>
                                                <td class="col-1">{{ $cv->date_init_company }}</td>
                                                <td class="col-1">{{ $cv->date_finally_company }}</td>

                                                <td class="col-1">{{ $cv->name_last_company2 }}</td>
                                                <td class="col-1">{{ $cv->position_last_company2 }}</td>
                                                <th class="col-1">{{ $cv->funtion_last_company2 }}</th>
                                                <td class="col-1">{{ $cv->date_init_company2 }}</td>
                                                <td class="col-1">{{ $cv->date_finally_company2 }}</td>

                                                <td class="col-1">{{ $cv->family }}</td>
                                                <td class="col-1">{{ $cv->like_to_work }}</td>
                                                <td class="col-1">{{ $cv->previously_work }}</td>
                                                <td class="col-1">{{ $cv->should_choose }}</td>
                                                <td class="col-1">{{ $cv->shirt_size }}</td>
                                                <td class="col-1">{{ $cv->pant_size }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <hr class="sidebar-divider">

            </div>

        </div>
    </div>

    <div class="container pt-3">
        <div class="row d-flex justify-content-center">
            <div class="col-12 text-xs-center">
                {{ $cvs->links() }}
            </div>
        </div>
    </div>
@endsection
