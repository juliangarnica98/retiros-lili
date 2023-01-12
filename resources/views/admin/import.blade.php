@extends('layouts.admin')
<style>
    input[type=file]::file-selector-button {
        margin-right: 20px;
        border: none;
        background: #ba639b;
        padding: 10px 20px;
        border-radius: 10px;
        color: #fff;
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
        border-radius: 8px;
        color: #fff;
        cursor: pointer;
        background: #e85199;
        transition: background .2s ease-in-out;
    }

    .input_file:hover {
        background: #ba639b;
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


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h1 class="text-center">Importa mis colaboradores</h1>
                <div class="card">
                    <div class="card-header">Seleccione un archivo excel</div>

                    <div class="card-body">

                        <form action="{{ route('admin.import.collaborator') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="file">
                                Selecciona un archivo
                                <input type="file" name="file" class="input_file"
                                    style="border-bottom: none;width:100%; color:#fff" multiple>
                            </div>
                            <hr class="sidebar-divider">
                            <button class="d-none d-sm-inline-block btn btn-block shadow-sm"
                                style="background-color: #269aa0;color:#fff">Importar colaboradores</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
