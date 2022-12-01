@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <form action="{{route('import.excel')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if(Session::has('message'))
                <p>{{Session::get('message')}}</p>
            @endif
            <input type="file" name="file">
            <button>Importar jefes</button>
        </form>
    </div>
</div>
@endsection
