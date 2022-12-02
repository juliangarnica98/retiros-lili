@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Importe los jefes activos</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
                    <form action="{{route('admin.import.excel')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(Session::has('message'))
                            <p>{{Session::get('message')}}</p>
                        @endif
                        <input type="file" name="file">
                        <button>Importar jefes</button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
