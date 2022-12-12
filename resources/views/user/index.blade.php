@can('edit')


@extends('layouts.app')

@section('template_title')
    User
@endsection


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('User') }}
                            </span>


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
                                        <th>Id</th>
                                        
										<th>Name</th>
										<th>Email</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>

                                            <td>
                                                <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                                    
                                                     @can('edit')

                                                    <a class="btn btn-sm btn-primary " href="{{ route('user.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    @endcan
                                                    @can('edit')
                                                    <a class="btn btn-sm btn-success" href="{{ route('user.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @endcan
                                                    @can('delete')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
                {!! $users->links() !!}
            </div>
        </div>
    </div>

    @endsection
    
@else
@section('content')
    <h1 style="text-align:center">
        Se Requiere Autorizacion

    </h1>
@endsection    
@endcan
