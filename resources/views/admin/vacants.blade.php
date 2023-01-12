@extends('layouts.admin')

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
    <div class="container pt-4 pl-2 pr-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{-- <a href="{{ url('administrador/exporttable/')}}" class="d-none d-sm-inline-block btn btn-sm  shadow-sm" style="background-color:  #17a0a1; color:#fff"><i
                class="fas fa-download fa-sm "></i> Generar reporte</a> --}}
                <h1 class="text-center">Vacantes</h1>
                <div class="card mt-3">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="" style="color: #fff">
                                <table class="table table-responsive " id="">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Fecha de creación</th>
                                            <th class="text-center">Titulo</th>
                                            <th class="text-center">Ciudad</th>
                                            <th class="text-center">Descripción</th>
                                            <th class="text-center">Salario</th>
                                            <th class="text-center">Experiencia reqierida</th>
                                            <th class="text-center">Número de vacantes</th>
                                            <th class="text-center">Número de postulaciones</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center col-1">Accion</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($vacants as $vacant)
                                            <tr>
                                                <td class="">{{ date('d-m-Y', strtotime($vacant->created_at)) }}</td>
                                                <td class="">{{ $vacant->title }}</td>
                                                <td class="">{{ $vacant->city }}</td>
                                                <td class="">{{ $vacant->description }}</td>
                                                <td class="">${{ $vacant->salary }}</td>
                                                <th class="">{{ $vacant->experience }}</th>
                                                <td class="">{{ $vacant->num_vacants }}</td>
                                                <td class="">{{ $vacant->num_aplic }}</td>
                                                @if ($vacant->state == 1)
                                                    <td class="">Abierta</td>
                                                @else
                                                    <td class="">Cerrada</td>
                                                @endif
                                                <td class="col-2">
                                                    <button class="btn btn-info" data-target="#exampleModal"
                                                        data-toggle="modal"><i class="fas fa-edit"></i></i></button>
                                                    <button class="btn btn-danger"><i
                                                            class="fas fa-window-close"></i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-dark" id="exampleModalLabel">Editar
                                                                vacante</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('admin.edit.vacant', $vacant->id) }}">
                                                            @method('PUT')
                                                            @csrf

                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-5">

                                                                            <div class="form-outline">

                                                                                <input type="text" id="form8Example1"
                                                                                    class="form-control" name="title"
                                                                                    value="{{ $vacant->title }}" />
                                                                                <label class="form-label text-dark"
                                                                                    for="form8Example1">Titulo</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-5">

                                                                            <div class="form-outline">
                                                                                <input type="text" id="form8Example2"
                                                                                    class="form-control" name="city"
                                                                                    value="{{ $vacant->city }}" />
                                                                                <label class="form-label text-dark"
                                                                                    for="form8Example2">Ciudad</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                    <div class="row justify-content-center">

                                                                        <div class="col-5">

                                                                            <div class="form-outline">
                                                                                <input type="text" id=""
                                                                                    class="form-control" name="salary"
                                                                                    value="{{ $vacant->salary }}" />
                                                                                <label class="form-label text-dark"
                                                                                    for="form8Example4">Salario</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-5">

                                                                            <div class="form-outline">
                                                                                <input type="text" id=""
                                                                                    class="form-control" name="num_vacants"
                                                                                    value="{{ $vacant->num_vacants }}" />
                                                                                <label class="form-label text-dark"
                                                                                    for="form8Example4">Número de
                                                                                    vacantes</label>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-10">

                                                                            <div class="form-outline">
                                                                                <input type="text" id=""
                                                                                    class="form-control"
                                                                                    name="description"
                                                                                    value="{{ $vacant->description }}" />
                                                                                <label class="form-label text-dark"
                                                                                    for="form8Example3">Descripcion</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row justify-content-center">
                                                                        <div class="col-10">

                                                                            <div class="form-outline">
                                                                                <input type="text" class="form-control"
                                                                                    name="experience" id=""
                                                                                    cols="30" rows="5"
                                                                                    value="{{ $vacant->experience }}">
                                                                                <label class="form-label text-dark"
                                                                                    for="form8Example3">Experiencia
                                                                                    requerida</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary">Guardar cambios</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
