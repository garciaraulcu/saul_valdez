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
    </div>
    <br>
    @can('delete')
    <a href="/roles">Crear Roles</a>
    <br>
    <a href="/giveroles">Asignar Roles</a>
    <br>
    <a href="/givepermissions">Asignar Permisos</a>
    @endcan
</div>
@endsection
