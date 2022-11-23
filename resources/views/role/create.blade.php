@can('create')
    @extends('layouts.app')

    @section('template_title')
        Create Role
    @endsection

    @section('content')
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Create Role</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('roles.store') }}" role="form" enctype="multipart/form-data">
                                @csrf

                                <div class="box box-info padding-1">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="rol">Role Name</label>
                                            <input type="text" name="rol" id="" class="form-control">
                                        </div>



                                        <br>

                                        @foreach ($permission as $per)
                                            <div class="form-group">
                                                <label for="">
                                                    {{ Form::checkbox('permission[]', $per->id, false, ['class' => 'name']) }}

                                                    {{ $per->name }}
                                                </label>
                                            </div>
                                        @endforeach

                                        <br>


                                    </div>
                                    <div class="box-footer mt20">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>


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
            Se Requiere Permiso
        </h1>
    @endsection
@endcan
