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


                <h1 class="text-center"> Crear vancate</h1>
                <div class="container">
                    <div class="card">

                        <div class="card-body">
                            <form method="post" action="{{ route('admin.crearvacante') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="row justify-content-center">
                                        <div class="col-5">
                                            <!-- Name input -->
                                            <div class="form-outline">
                                                <input type="text" id="form8Example1" class="form-control"
                                                    name="title" />
                                                <label class="form-label" for="form8Example1">Titulo</label>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <!-- Email input -->
                                            <div class="form-outline">
                                                <input type="text" id="form8Example2" class="form-control"
                                                    name="city" />
                                                <label class="form-label" for="form8Example2">Ciudad</label>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                    <div class="row justify-content-center">
                                        <div class="col-6">
                                            <!-- Name input -->
                                            <div class="form-outline">
                                                <input type="text" id="" class="form-control"
                                                    name="description" />
                                                <label class="form-label" for="form8Example3">Descripcion</label>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <!-- Name input -->
                                            <div class="form-outline">
                                                <input type="text" id="" class="form-control" name="salary" />
                                                <label class="form-label" for="form8Example4">Salario</label>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <!-- Name input -->
                                            <div class="form-outline">
                                                <input type="text" id="" class="form-control"
                                                    name="num_vacants" />
                                                <label class="form-label" for="form8Example4">Número de vacantes</label>
                                            </div>
                                        </div>
                                        {{-- <div class="col-4">
                                            <!-- Email input -->
                                            <div class="form-outline">
                                                <input type="email" id="form8Example5" class="form-control" />
                                                <label class="form-label" for="form8Example5">Email address</label>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <hr>
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <!-- Name input -->
                                            <div class="form-outline">
                                                <textarea class="form-control" name="experience" id="" cols="30" rows="5"></textarea>
                                                <label class="form-label" for="form8Example3">Experiencia requerida</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-content-center aling-items-center text-center">
                                    <button class="btn" style="background-color: #e85199;color:#fff;">Crear
                                        vacante</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>



            </div>

        </div>
    </div>
@endsection
