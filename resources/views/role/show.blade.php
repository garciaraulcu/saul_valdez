@extends('layouts.app')

@section('template_title')
    {{ $role->name ?? 'Show Role' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Role</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $role->name }}
                        </div>
                        <div class="form-group">
                            <strong>Guard Name:</strong>
                            {{ $role->guard_name }}
                        </div>
                        <br>

                        <b>Permisos: </b><br><br>
                         
                        @foreach ($data as $item)
                        <div class="form-group">
                            <input type="checkbox" name="{{ $item->name }}" checked>
                            <label for="{{ $item->name }}"> {{ $item->name }}</label><br>
                        </div>
                        @endforeach
                
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
