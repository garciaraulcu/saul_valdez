@can('edit')
    @extends('layouts.app')

    @section('template_title')
        Model Has Role
    @endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    {{ __('Model Has Role') }}
                                </span>

                                @can('edit')
                                    <div class="float-right">
                                        <a href="{{ route('giveroles.create') }}" class="btn btn-primary btn-sm float-right"
                                            data-placement="left">
                                            {{ __('Create New') }}
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>

                                            <th>Id </th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>E-mail</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($giveroles as $giverole)
                                            <tr>

                                                <td>{{ $giverole->model_id }} </td>
                                                <td>{{ $giverole->name }} </td>
                                                <td >
                                                    <b style="
                                                        background-color:gray;
                                                        color:aliceblue;
                                                        border-radius: 100px;
                                                        padding: 5px 10px 5px 10px

                                                        ">
                                                        {{ $giverole->role_name }}

                                                    </b>
                                                </td>
                                                <td>{{ $giverole->email }}</td>

                                                <td>
                                                    <form action="{{ route('giveroles.destroy', $giverole->model_id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('giveroles.show', $giverole->model_id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Show</a>
                                                        @can('edit')
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('giveroles.edit', $giverole->model_id) }}"><i
                                                                    class="fa fa-fw fa-edit"></i> Edit</a>
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('delete')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-fw fa-trash"></i> Delete</button>
                                                        @endcan
                                                    </form>
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
        </div>
    @endsection

@else
    @section('content')
        <h1 style="text-align: center">
            Se Requiere Permiso
        </h1>
    @endsection
@endcan
