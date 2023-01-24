@extends('layouts.admin')
<style>
    /* * {
      box-sizing: border-box;
    }
    body {
      background-color: #f1f1f1;
    } */
    #regForm {
        background-color: #ffffff;
        margin: 10vh;

        padding: 40px;
        width: 80%;
        min-width: 300px;
    }

    /* h1 {
      text-align: center;
    } */
    /* input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        border: 1px solid #aaaaaa;
    } */
    input {
        color: #000000;
        border: none;
        border-bottom: 3px solid rgb(232, 81, 153);
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #04AA6D;
    }

    /* .redondo{
      margin-top: 5%;
      display: block;
      border-radius: 15px;
      background-color: #04AA6D;
      border-color: none;
    } */
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
            <div class="col-md-11">
                <div class="card mt-5 border-info">
                    <form id="regForm" action="{{ route('boss.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="tab">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" id="id_co" name="collaborator_id" hidden>
                                    <div class="form-group">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Identificación del
                                            colaborador</label>
                                        <input type="number" class="form-control" id="document"
                                            name="document_collaborator" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <!-- Street 1 -->
                                        <label for="street1_id" class="control-label">Nombre del colaborador</label>
                                        <input type="text" class="form-control" id="name" name="name_collaborator"
                                            placeholder="" readonly>
                                    </div>
                                    <input type="hidden" class="form-control" id="region" name="region" placeholder=""
                                        readonly>
                                    <input type="hidden" class="form-control" id="region_jefe" name="region_jefe"
                                        placeholder="" readonly value="{{ $regional }}">


                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Calificación desempeño</label>
                                        <label>Seleccione de 1 a 3 el desempeño del colaborador a retirar de acuerdo a su
                                            criterio, tenga en cuenta la siguiente escala: 1 desempeño bajo, 2 desempeño
                                            medio y 3 desempeño bueno.</label>
                                        {{-- <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder=""> --}}
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input " type="radio" name="performance"
                                                id="performance" value="1" checked>
                                            <label class="form-check-label ml-5" for="performance">
                                                1
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="radio" name="performance" value="1"
                                                id="performance">
                                            <label class="form-check-label ml-5" for="performance">
                                                2
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="radio" name="performance" value="1"
                                                id="performance">
                                            <label class="form-check-label ml-5" for="performance">
                                                3
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <!-- Full Name -->

                                        <label for="full_name_id" class="control-label">Razón de desempeño</label>
                                        {{-- <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder=""> --}}
                                        <input type="text" class="form-control" id="reason_performance"
                                            name="reason_performance" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <!-- Full Name -->

                                        <label for="full_name_id" class="control-label">Tipo de retiro</label>
                                        {{-- <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder=""> --}}
                                        <select class="form-select form-control" aria-label="Default select example"
                                            name="type_retirement_id">
                                            {{-- <option value="" selected>Seleccione algun tipo de retiro</option> --}}
                                            @foreach ($type_retirements as $type_retirement)
                                                <option value="{{ $type_retirement->id }}">
                                                    {{ $type_retirement->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">INDIQUE LA RAZON DEL RETIRO
                                        </label>
                                        <input type="text" class="form-control" id="reason" name="reason"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Ultimo día laborado</label>
                                        <input type="date" class="form-control" id="last_day" name="last_day"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Dinero pendiente</label>
                                        <label for="full_name_id" class="control-label">Indique si el colaborador debe
                                            dinero de la tienda tales como caja menor u otros</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="money_pend"
                                                id="dinero_si" value="si">
                                            <label class="form-check-label" for="dinero_si">
                                                si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="money_pend"
                                                id="dinero_no" value="no" checked>
                                            <label class="form-check-label" for="dinero_no">
                                                no
                                            </label>
                                        </div>
                                    </div>
                                    <div id="dinero_pendiente" style="display: none">
                                        <div class="form-group">
                                            <!-- Full Name -->
                                            <label for="full_name_id" class="control-label">Cantidad de dinero
                                                pendiente</label>
                                            <input type="text" class="form-control" id="full_name_id"
                                                name="money_amou" value="0">
                                        </div>
                                        <div class="form-group">
                                            <!-- Full Name -->
                                            <label for="full_name_id" class="control-label">Concepto dinero
                                                pendiente</label>
                                            <input type="text" class="form-control" id="money_conc" name="money_conc"
                                                value="-">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="fecha_novedad">
                            <div class="row" id="fechas1">
                                <div class="col-12">
                                    <label for="full_name_id" class="control-label">Novedades Compensatorio
                                        Indique las fechas de los días que se le deben al colaborador por términos de
                                        compensatorio.</label>

                                    <div class="form-group fechas" id="fechas">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Fecha Novedad 1</label>
                                        <input type="date" class="form-control fecha_n" id="date_1" name="date_1"
                                            value="2000-01-01">
                                    </div>
                                    <div class="form-group fechas" id="fechas">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Fecha Novedad 2</label>
                                        <input type="date" class="form-control fecha_n" id="date_2" name="date_2"
                                            value="2000-01-01">
                                    </div>
                                    <div class="form-group fechas" id="fechas">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Fecha Novedad 3</label>
                                        <input type="date" class="form-control fecha_n" id="date_3" name="date_3"
                                            value="2000-01-01">
                                    </div>
                                    <div class="form-group fechas" id="fechas">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Fecha Novedad 4</label>
                                        <input type="date" class="form-control fecha_n" id="date_4" name="date_4"
                                            value="2000-01-01">
                                    </div>
                                    <div class="form-group fechas" id="fechas">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Fecha Novedad 5</label>
                                        <input type="date" class="form-control fecha_n" id="date_5" name="date_5"
                                            value="2000-01-01">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="fecha_dominical">
                            <div class="row" id="fechas2">
                                <div class="col-12">
                                    <label for="full_name_id" class="control-label"> Dominicales/Festivo A
                                        Liquidar</label>

                                    <div class="form-group fechas" id="fechas">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Fecha dominical 1</label>
                                        <input type="date" class="form-control" id="date_d_1" name="date_d_1"
                                            value="2000-01-01">
                                    </div>
                                    <div class="form-group fechas" id="fechas">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Fecha dominical 2</label>
                                        <input type="date" class="form-control" id="date_d_2" name="date_d_2"
                                            value="2000-01-01">
                                    </div>
                                    <div class="form-group fechas" id="fechas">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Fecha dominical 3</label>
                                        <input type="date" class="form-control" id="date_d_3" name="date_d_3"
                                            value="2000-01-01">
                                    </div>
                                    <div class="form-group" id="fechas">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Fecha dominical 4</label>
                                        <input type="date" class="form-control" id="date_d_4" name="date_d_4"
                                            value="2000-01-01">
                                    </div>
                                    <div class="form-group fechas" id="fechas">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Fecha dominical 5</label>
                                        <input type="date" class="form-control" id="date_d_5" name="date_d_5"
                                            value="2000-01-01">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group" id="entrega_tienda">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Se realizo
                                            entrega de</label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="jean"
                                                name="ti_jean" id="jean">
                                            <label class="form-check-label" for="jean">
                                                Jean
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="camisa"
                                                name="ti_camisa" id="camisa">
                                            <label class="form-check-label" for="camisa">
                                                Camisa
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="gafete"
                                                id="gafete" name="ti_gafete">
                                            <label class="form-check-label" for="Gafete">
                                                Gafete
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="token"
                                                id="ti_token" name="ti_token">
                                            <label class="form-check-label" for="ti_token">
                                                Token
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="carnet"
                                                id="ti_carnet" name="ti_carnet">
                                            <label class="form-check-label" for="ti_carnet">
                                                Carnet
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="canguro"
                                                id="canguro" name="ti_canguro">
                                            <label class="form-check-label" for="canguro">
                                                Canguro
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="celular"
                                                id="ti_celular" name="ti_celular">
                                            <label class="form-check-label" for="canguro">
                                                Celular
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                value="No hace entrega de ninguno de los anteriores" id="ti_ninguno"
                                                name="ti_ninguno" checked>
                                            <label class="form-check-label" for="ti_ninguno">
                                                No hace entrega de ninguno de los anteriores
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group" id="entrega_administrador">
                                        <!-- Full Name -->
                                        <label for="full_name_id" class="control-label">Se realizo
                                            entrega de
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="carnet"
                                                    name="ad_carnet" id="ad_carnet">
                                                <label class="form-check-label" for="carnet">
                                                    Carnet
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="tokens"
                                                    name="ad_tokens" id="ad_tokens">
                                                <label class="form-check-label" for="tokens">
                                                    Tokens
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="pc"
                                                    id="ad_pc" name="ad_pc">
                                                <label class="form-check-label" for="pc">
                                                    Equipo de computo
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="celular"
                                                    id="ad_celular" name="ad_celular">
                                                <label class="form-check-label" for="pc">
                                                    Celular
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="ad_ninguno"
                                                    id="ad_ninguno" name="ad_ninguno" checked>
                                                <label class="form-check-label" for="ad_ninguno">
                                                    No hace entrega de ninguno de los anteriores
                                                </label>
                                            </div>
                                    </div>
                                    <div class="form-group" id="entrega_cedi">
                                        <label for="full_name_id" class="control-label">Se realizo
                                            entrega de
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="carnet"
                                                    name="cedi_jean" id="cedi_jean">
                                                <label class="form-check-label" for="carnet">
                                                    Jean
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="tokens"
                                                    name="cedi_camisa" id="cedi_camisa">
                                                <label class="form-check-label" for="tokens">
                                                    Camisa
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="botas"
                                                    id="cedi_botas" name="cedi_botas">
                                                <label class="form-check-label" for="pc">
                                                    Botas
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="terminal"
                                                    id="cedi_terminal" name="cedi_terminal">
                                                <label class="form-check-label" for="pc">
                                                    Terminal
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="token"
                                                    id="cedi_token" name="cedi_token">
                                                <label class="form-check-label" for="pc">
                                                    Token
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="carnet"
                                                    id="cedi_carnet" name="cedi_carnet">
                                                <label class="form-check-label" for="pc">
                                                    Carnet
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="chaqueta"
                                                    id="cedi_chaqueta" name="cedi_chaqueta">
                                                <label class="form-check-label" for="pc">
                                                    Chaqueta
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="canguro"
                                                    id="cedi_canguro" name="cedi_canguro">
                                                <label class="form-check-label" for="pc">
                                                    Canguro
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="cofia"
                                                    id="cedi_cofia" name="cedi_cofia">
                                                <label class="form-check-label" for="pc">
                                                    Cofia
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="celular"
                                                    id="cedi_celular" name="cedi_celular">
                                                <label class="form-check-label" for="pc">
                                                    Celular
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="ad_ninguno"
                                                    id="cedi_ninguno" name="cedi_ninguno" checked>
                                                <label class="form-check-label" for="ad_ninguno">
                                                    No hace entrega de ninguno de los anteriores
                                                </label>
                                            </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">

                                        <label for="full_name_id" class="control-label">Acta De Entrega</label>
                                        <select class="form-select form-control" aria-label="Default select example"
                                            name="delivery_certificate" id="delivery_certificate">
                                            <option value="no aplica">No aplica</option>
                                            <option value="si">Si</option>
                                            <option value="no"> No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="full_name_id" class="control-label"> Carta De Renuncia</label>
                                        <select class="form-select form-control" aria-label="Default select example"
                                            name="letter" id="letter">
                                            <option value="no"> No</option>
                                            <option value="si">Si</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group" id="certificacion" style="display: none">
                                        <label for="full_name_id" class="control-label">Adjunta certificación</label>
                                        <input class="form-control" type="file" name="dir_certificate"
                                            id="dir_certificate">
                                    </div>
                                    <div class="form-group" id="carta" style="display: none">
                                        <label for="full_name_id" class="control-label">Adjunta carta</label>
                                        <input class="form-control" type="file" name="dir_letter" id="dir_letter">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="overflow:auto;">
                            <div>
                                <button style="float:left;background-color:#03b4a1;color:#fff" class="col-md-4 btn "
                                    type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
                                <button style="float:right;background-color:#fc007e;color:#fff" class="col-md-4 btn "
                                    type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
                            </div>
                        </div>
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>

                            <span class="step" id="fecha1"></span>
                            <span class="step" id="fecha2"></span>

                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script>
        var currentTab = 0;

        let documento = document.querySelector('#document');
        let fechas = document.querySelector('#fechas');
        let fechas1 = document.querySelector('#fechas1');
        let fechas2 = document.querySelector('#fechas2');
        let fecha_dominical = document.querySelector('#fecha_dominical');
        let fecha_novedad = document.querySelector('#fecha_novedad');
        let name = document.querySelector('#name');
        let id_co = document.querySelector('#id_co');
        let dinero_si = document.querySelector('#dinero_si');
        let dinero_no = document.querySelector('#dinero_no');
        let dinero_pendiente = document.querySelector('#dinero_pendiente');
        let entrega_tienda = document.querySelector('#entrega_tienda');
        let entrega_administrador = document.querySelector('#entrega_administrador');
        let entrega_cedi = document.querySelector('#entrega_cedi');
        let region = document.querySelector('#region');
        let region_jefe = document.querySelector('#region_jefe');

        let carta = document.querySelector('#carta');
        let certificacion = document.querySelector('#certificacion');

        showTab(currentTab);

        function showTab(n) {

            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Enviar";
            } else {
                document.getElementById("nextBtn").innerHTML = "Siguiente";
            }
            fixStepIndicator(n)
        }

        function nextPrev(n) {

            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, z, i, valid = true;
            x = document.getElementsByClassName("tab");
            // z = document.getElementsByClassName("fecha_n");
            y = x[currentTab].getElementsByTagName("input");

            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length-2; i++) {

                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false

                    valid = false;
                    // if (z[i].value == "") {
                    //   valid = true;
                    // }
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
        //Mostrar dinero pendiente si
        dinero_si.addEventListener("change", function(event) {
            dinero_pendiente.style.display = 'block';
        });
        //Mostrar dinero pendiente no
        dinero_no.addEventListener("change", function(event) {
            dinero_pendiente.style.display = 'none';
        });
        //busqueda de colaborador
        documento.addEventListener("change", function() {

            let data = {
                'document': document.querySelector('#document').value,
                'region_jefe': document.querySelector('#region_jefe').value,
            }
            fetch('busqueda', {
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    method: 'POST',
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(function(result) {
                    name.value = result.name;
                    id_co.value = result.id;
                    region.value = result.position;
                    if (name.value == "") {
                        Swal.fire({
                            title: 'Error!',
                            text: 'No se ha encontrado el documento en nuestras bases',
                            icon: 'warning',
                            confirmButtonText: 'Continuar'
                        })
                    }

                    if (result.position == 1 || result.position == 2 || result.position == 14) {
                        fecha1.style.display = 'none';
                        fechas1.style.display = 'none';
                        fecha2.style.display = 'none';
                        fechas2.style.display = 'none';
                        fecha1.classList.remove('step');
                        fecha2.classList.remove('step');
                        fecha_dominical.classList.remove('tab');
                        fecha_novedad.classList.remove('tab');

                        entrega_tienda.style.display = 'none';
                        entrega_administrador.style.display = 'block';
                        entrega_cedi.style.display = 'none';
                    } else if (result.position == 3 || result.position == 4) {
                        entrega_tienda.style.display = 'none';
                        entrega_administrador.style.display = 'none';
                        entrega_cedi.style.display = 'block';
                    } else {
                        entrega_tienda.style.display = 'block';
                        entrega_administrador.style.display = 'none';
                        entrega_cedi.style.display = 'none';
                    }
                })
                .catch(function(error) {
                    name.value = "";
                    id_co.value = "";
                });

        });

        const selectElement = document.querySelector('#letter');

        selectElement.addEventListener('change', (event) => {
            const carta = document.querySelector('#carta');
            console.log(`${event.target.value}`);
            if(`${event.target.value}`== 'si'){  
                carta.style.display = 'block';
            }
            if(`${event.target.value}`== 'no'){
                carta.style.display = 'none';
            }
        });
        const selectElement2 = document.querySelector('#delivery_certificate');

        selectElement2.addEventListener('change', (event) => {
            const carta = document.querySelector('#certificacion');
            console.log(`${event.target.value}`);
            if(`${event.target.value}`== 'si'){  
                carta.style.display = 'block';
            }
            if(`${event.target.value}`== 'no'||`${event.target.value}`== 'no aplica'){
                carta.style.display = 'none';
            }
        });
    </script>
@endsection
