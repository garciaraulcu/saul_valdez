@extends('layouts.app')

@section('template_title')
    {{ $modelHasPermission->name ?? 'Show Model Has Permission' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Model Has Permission</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('model-has-permissions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Permission Id:</strong>
                            {{ $modelHasPermission->permission_id }}
                        </div>
                        <div class="form-group">
                            <strong>Model Type:</strong>
                            {{ $modelHasPermission->model_type }}
                        </div>
                        <div class="form-group">
                            <strong>Model Id:</strong>
                            {{ $modelHasPermission->model_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
