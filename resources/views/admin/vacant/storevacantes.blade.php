{{-- @extends('layouts.admin')

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
    @endif --}}

    <div class="modal fade" id="Modalstore" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"
                        id="exampleModalLabel">Crear
                        vacante</h5>
                    <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST"
                    action="{{ route('admin.crearvacante') }}">
                    
                    @csrf
    
                    <div class="modal-body">
    
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-5">
    
                                    <div class="form-outline">
    
                                        <input type="text"
                                            id="form8Example1"
                                            class="form-control"
                                            name="title"
                                             />
                                        <label
                                            class="form-label text-dark"
                                            for="form8Example1">Titulo</label>
                                    </div>
                                </div>
                                <div class="col-5">
    
                                    <div class="form-outline">
                                        <input type="text"
                                            id="form8Example2"
                                            class="form-control"
                                            name="city"
                                            />
                                        <label
                                            class="form-label text-dark"
                                            for="form8Example2">Ciudad</label>
                                    </div>
                                </div>
                            </div>
    
    
    
                            <div class="row justify-content-center">
    
                                <div class="col-5">
    
                                    <div class="form-outline">
                                        <input type="text"
                                            id=""
                                            class="form-control"
                                            name="salary"
                                             />
                                        <label
                                            class="form-label text-dark"
                                            for="form8Example4">Salario</label>
                                    </div>
                                </div>
                                <div class="col-5">
    
                                    <div class="form-outline">
                                        <input type="text"
                                            id=""
                                            class="form-control"
                                            name="num_vacants"
                                             />
                                        <label
                                            class="form-label text-dark"
                                            for="form8Example4">Número
                                            de
                                            vacantes</label>
                                    </div>
                                </div>
    
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-10">
    
                                    <div class="form-outline">
                                        <input type="text"
                                            id=""
                                            class="form-control"
                                            name="description"
                                           />
                                        <label
                                            class="form-label text-dark"
                                            for="form8Example3">Descripcion</label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row justify-content-center">
                                <div class="col-10">
    
                                    <div class="form-outline">
                                        <input type="text"
                                            class="form-control"
                                            name="experience"
                                            id=""
                                            cols="30"
                                            rows="5"
                                            >
                                        <label
                                            class="form-label text-dark"
                                            for="form8Example3">Experiencia
                                            requerida</label>
                                    </div>
                                </div>
                            </div>
                        </div>
    
    
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Guardar
                            cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="container pt-4 pl-2 pr-2">
        <div class="row justify-content-center">
            <div class="col-md-9">


                <h1 class="text-center"> Crear vancate</h1>
                <div class="container">
                    <div class="card" style="background-color: #e6e6e6;border-radius: 10px;">

                        <div class="card-body" >
                            <form method="post" action="{{ route('admin.crearvacante') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="row justify-content-center pt-3">
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

                            

                                    <div class="row justify-content-center">
                                      
                                        <div class="col-5">
                                            <!-- Name input -->
                                            <div class="form-outline">
                                                <input type="number" id="" class="form-control" name="salary" />
                                                <label class="form-label" for="form8Example4">Salario</label>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <!-- Name input -->
                                            <div class="form-outline">
                                                <input type="number" id="" class="form-control"
                                                    name="num_vacants" />
                                                <label class="form-label" for="form8Example4">Número de vacantes</label>
                                            </div>
                                        </div>
                                        { <div class="col-4">
                                            <!-- Email input -->
                                            <div class="form-outline">
                                                <input type="email" id="form8Example5" class="form-control" />
                                                <label class="form-label" for="form8Example5">Email address</label>
                                            </div>
                                        </div> -
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                          
                                            <div class="form-outline">
                                                <textarea class="form-control" name="description" id="" cols="20" rows="3"></textarea>
                                                <label class="form-label" for="form8Example3">Descripción</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <!-- Name input -->
                                            <div class="form-outline">
                                                <textarea class="form-control" name="experience" id="" cols="20" rows="3"></textarea>
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
@endsection --}}
