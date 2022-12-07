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
            <h1 class="text-center">Colaboradores activos</h1>
            
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm  shadow-sm" style="background-color:  #17a0a1; color:#fff"><i
                class="fas fa-download fa-sm "></i> Generar reporte</a> --}}
                <hr class="sidebar-divider">
                <div class="card">
                    <div class=" mt-3">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Documento</th>
                                        <th scope="col">Cargo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($collaborators as $collaborator )
                                    <tr>
                                        <th >{{$collaborator->name}}</th>
                                        <td>{{$collaborator->document}}</td>
                                        <td>
                                            @foreach ( $positions as $position )
                                                @if ($collaborator->position_id==$position->id)
                                                {{$position->description}}
                                                @endif
                                            @endforeach
                                        </td>
        
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                                </div>
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