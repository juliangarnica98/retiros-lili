@extends('layouts.admin')
<style>
    /* .custom-file-input ~ .custom-file-label::after {
    content: "Elegir";
    } */


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
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h1 class="text-center">Importa los jefes</h1>
                <div class="card">
                    <div class="card-header">Seleccione un archivo excel</div>
                    <div class="card-body">
                        <form action="{{ route('admin.import.excel') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="file">
                                Selecciona un archivo
                                <input type="file" name="file" class="input_file"
                                    style="border-bottom: none;width:100%; color:#fff" multiple>
                            </div>
                            <hr class="sidebar-divider">
                            <button class="d-none d-sm-inline-block btn btn-block shadow-sm"
                                style="background-color: #269aa0;color:#fff">Importar jefes</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
<script>
    'use strict';

    ;
    (function(document, window, index) {
        var inputs = document.querySelectorAll('.inputfile');
        Array.prototype.forEach.call(inputs, function(input) {
            var label = input.nextElementSibling,
                labelVal = label.innerHTML;

            input.addEventListener('change', function(e) {
                var fileName = '';
                if (this.files && this.files.length > 1)
                    fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}',
                        this.files.length);
                else
                    fileName = e.target.value.split('\\').pop();

                if (fileName)
                    label.querySelector('span').innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });
        });
    }(document, window, 0));
</script>
