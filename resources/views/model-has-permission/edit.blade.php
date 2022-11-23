@can('edit')
@extends('layouts.app')

@section('template_title')
    Update Model Has Role
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Model Has Role</span>
                    </div>
                    <div class="card-body">

                        @foreach ($data as $item)
                            
                        @endforeach
                        <form method="POST" action="{{ route('givepermissions.update',$item->model_id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="permissions_id">Edit Permission</label>
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

                            </div>
                            
                            <button type="submit" class="btn btn-primary"> Update </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@else
    @section('content')
        <h1 style="text-align: center">
            Se Rquiere Permiso
        </h1>
    @endsection
@endcan