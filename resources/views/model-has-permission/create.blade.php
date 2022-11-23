
@can('edit')

@extends('layouts.app')

@section('template_title')
    Create Model Has Permission
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Model Has Permission</span>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('givepermissions.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="permissions_id">Select Permission</label>

                                    <select name="permission_id" id="permissions_id" class="form-select">
                                        <option value="index">Index</option>
                                        <option value="show">Show</option>
                                        <option value="create">Create</option>
                                        <option value="store">Store</option>
                                        <option value="update">Update</option>
                                        @can('delete')
                                        <option value="delete">Delete</option>
                                            
                                        @endcan
                                        <option value="edit">Edit</option>
                                    </select>
                                </div>
                                <br>

                              
                              <div class="form-group">
                                <label for="model_type">Model Id</label>

                                  <input type="text" name="model_id" class="form-control" required>

                              </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary"> Crear </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection    
@else

@section('content')
<br><br><br><br><br><h1 style="text-align:center"> Se Requiere Autorizacion</h1>
    
@endsection    
@endcan