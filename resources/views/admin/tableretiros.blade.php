@extends('layouts.admin')

@section('content')
<div class="container pt-4 pl-2 pr-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- <div class="card">
                <div class="card-header">Importe los jefes activos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <form action="{{route('admin.import.excel')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(Session::has('message'))
                            <p>{{Session::get('message')}}</p>
                        @endif
                        <input type="file" name="file">
                        <button>Importar jefes</button>
                    </form>
                </div>
            </div> --}}
            {{-- <h1 class="text-center">Todos los retiros</h1> --}}
            
            <a href="{{ url('administrador/exporttable/')}}" class="d-none d-sm-inline-block btn btn-sm  shadow-sm" style="background-color:  #17a0a1; color:#fff"><i
                class="fas fa-download fa-sm "></i> Generar reporte</a>
                {{-- <div class="d-flex justify-content-center">
                    <input id="searchTerm" class=" text-center col-md-6" type="text" onkeyup="doSearch()" placeholder="Buscar ..."/>
                </div>
                <p id="search"></p> --}}
                 
                <hr class="sidebar-divider">
                <div class="card mt-3">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="table-responsive" style="color: #fff">
                                <table class="table table-responsive stacktable" id="tablaretiros">
                                    <thead>
                                        <tr class="d-flex">
                                            <th class="col-1">Fecha de retiro</th>
                                            <th class="col-1">Nombre del colaborador</th>
                                            <th  class="col-1">Encargado del retiro</th>
                                            <th  class="col-1">documento del colaborador</th>
                                            <th  class="col-1">Desempeño</th>
                                            <th  class="col-1">Tipo de retiro</th>
                                            <th  class="col-1">Ultimo dia laborado</th>
                                            <th  class="col-1">dinero pendiente</th>
                                            <th  class="col-1">cantidad dinero pendiente</th>
                                            <th  class="col-1">concepto de dinero pendiente</th>
                                            <th  class="col-1">fecha novedad 1</th>
                                            <th  class="col-1">fecha novedad 2</th>
                                            <th  class="col-1">fecha novedad 3</th>
                                            <th  class="col-1">fecha novedad 4</th>
                                            <th  class="col-1">fecha novedad 5</th>
                                            <th  class="col-1">fecha dominical 1</th>
                                            <th  class="col-1">fecha dominical 2</th>
                                            <th  class="col-1">fecha dominical 3</th>
                                            <th  class="col-1">fecha dominical 4</th>
                                            <th  class="col-1">fecha dominical 5</th>
                                            <th style=" width: 25vw;" class="col-1">Entrega <strong>Perfil de tienda</strong></th>
                                            <th style=" width: 25vw;" class="col-1">Entrega <strong>Administrador</strong></th>
                                            <th style=" width: 25vw;" class="col-1">Entrega <strong>Cedi</strong></th>
                                            <th  class="col-1">Equipo celular</th>
                                            <th  class="col-1">Acta de entrega</th>
                                            <th  class="col-1">Carta de renuncia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        @foreach ($retiros as $retiro)
                                            <tr class="d-flex"> 
                                                <td class="col-1">{{date('d-m-Y',strtotime($retiro->created_at))}}</td>
                                                <td   class="col-1">{{$retiro->name_collaborator}}</td>
            
                                                @foreach ($users as $user)
                                                    @if ($retiro->user_id ==  $user->id)
                                                        <td class="col-1">{{$user->name}}</td>    
                                                    @endif
                                                @endforeach
                                                <td class="col-1">{{$retiro->document_collaborator}}</td>
                                                <td class="col-1">{{$retiro->performance}}</td>
                                                @foreach ($tipo_retiro as $typo )
                                                    @if ($retiro->type_retirement_id == $typo->id)
                                                        <td class="col-1">{{$typo->description}}</td>
                                                    @endif
                                                @endforeach
                                                <td class="col-1">{{$retiro->last_day}}</td>
                                                <th class="col-1">{{$retiro->money_pend}}</th>
                                                <td class="col-1">{{$retiro->money_amou}}</td>
                                                <td class="col-1">{{$retiro->money_conc}}</td>
                                                <td class="col-1">{{$retiro->date_1}}</td>
                                                <td class="col-1">{{$retiro->date_2}}</td>
                                                <th class="col-1">{{$retiro->date_3}}</th>
                                                <td class="col-1">{{$retiro->date_4}}</td>
                                                <td class="col-1">{{$retiro->date_5}}</td>
                                                <td class="col-1">{{$retiro->date_d_1}}</td>
                                                <td class="col-1">{{$retiro->date_d_2}}</td>
                                                <th class="col-1">{{$retiro->date_d_3}}</th>
                                                <td class="col-1">{{$retiro->date_d_4}}</td>
                                                <td class="col-1">{{$retiro->date_d_5}}</td>
                                            
                                                <td class="col-1">{{$retiro->store_ent}}</td>
                                                <td class="col-1">{{$retiro->admin_ent}}</td>
                                                <td class="col-1">{{$retiro->cedi_ent}}</td>
                                                <td class="col-1">{{$retiro->cell}}</td>
                                                <td class="col-1">{{$retiro->delivery_certificate}}</td>
                                                <td class="col-1">{{$retiro->letter}}</td>
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
            {{ $retiros->links() }}
        </div>
    </div>
</div>
<script>
        function doSearch()

{

    const tableReg = document.getElementById('datos');

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

    const lastTR=tableReg.rows[tableReg.rows.length-1];

    const td=document.querySelector("#search");

    lastTR.classList.remove("hide", "red");

    if (searchText == "") {

        lastTR.classList.add("hide");

    } else if (total) {

        td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");

    } else {

        lastTR.classList.add("red");

        td.innerHTML="No se han encontrado coincidencias";

    }

}
// $('#tablaretiros').stacktable();
</script>
@endsection