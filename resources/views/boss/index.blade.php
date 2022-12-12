@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
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
            <h1 class="text-center">Retiros realizados</h1>
            
            <a href="#" class="d-none d-sm-inline-block btn btn-sm  shadow-sm" style="background-color:  #17a0a1; color:#fff"><i
                class="fas fa-download fa-sm "></i> Generar reporte</a>
                <hr class="sidebar-divider">
                <div class="card mt-3">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                <tr>
                                    <th >Fecha de retiro</th>
                                    <th colspan="5">Nombre del colaborador</th>
                                    <th >documento del colaborador</th>
                                    <th >Desempeño</th>
                                    <th >Tipo de retiro</th>
                                    <th >Ultimo dia laborado</th>
                                    <th >dinero pendiente</th>
                                    <th >cantidad dinero pendiente</th>
                                    <th >concepto de dinero pendiente</th>
                                    <th >fecha novedad 1</th>
                                    <th >fecha novedad 2</th>
                                    <th >fecha novedad 3</th>
                                    <th >fecha novedad 4</th>
                                    <th >fecha novedad 5</th>
                                    <th >fecha dominical 1</th>
                                    <th >fecha dominical 2</th>
                                    <th >fecha dominical 3</th>
                                    <th >fecha dominical 4</th>
                                    <th >fecha dominical 5</th>
                                    <th >Bono de cumplimiento tienda</th>
                                    <th >Horas extra</th>
                                    <th >Entrega <strong>Perfil de tienda</strong></th>
                                    <th >Entrega <strong>Administrador</strong></th>
                                    <th >Equipo celular</th>
                                    <th >Acta de entrega</th>
                                    <th >Carta de renuncia</th>
                                </tr>
                                </thead>
                                <tbody>
                                    
                                @foreach ($retiros as $retiro)
                                {{-- {{dd($retiro)}} --}}
                                <tr>
                                    
                                    <th>{{date('d-m-Y',strtotime($retiro->created_at))}}</th>
                                    <th colspan="5" ><strong>{{$retiro->name_collaborator}}</strong></th>
                                    <td>{{$retiro->document_collaborator}}</td>
                                    <td>{{$retiro->performance}}</td>
                                    <td>{{$retiro->type_retirement_id}}</td>
                                    <td>{{$retiro->last_day}}</td>
                                    <th>{{$retiro->money_pend}}</th>
                                    <td>{{$retiro->money_amou}}</td>
                                    <td>{{$retiro->money_conc}}</td>
                                    <td>{{$retiro->date_1}}</td>
                                    <td>{{$retiro->date_2}}</td>
                                    <th>{{$retiro->date_3}}</th>
                                    <td>{{$retiro->date_4}}</td>
                                    <td>{{$retiro->date_5}}</td>
                                    <td>{{$retiro->date_d_1}}</td>
                                    <td>{{$retiro->date_d_2}}</td>
                                    <th>{{$retiro->date_d_3}}</th>
                                    <td>{{$retiro->date_d_4}}</td>
                                    <td>{{$retiro->date_d_5}}</td>
                                    <td>{{$retiro->cum_bonus}}</td>
                                    <td>{{$retiro->cat_bonus}}</td>
                                    <th>{{$retiro->ext_bonus}}</th>
                                    <td>{{$retiro->store_ent}}</td>
                                    <td>{{$retiro->admin_ent}}</td>
                                    <td>{{$retiro->cell}}</td>
                                    <td>{{$retiro->delivery_certificate}}</td>
                                    <td>{{$retiro->letter}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <hr class="sidebar-divider">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
        </div>
        
    </div>
</div>
@endsection