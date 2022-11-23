@extends('layouts.app')

@section('template_title')
    Model Has Permission
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Model Has Permission') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('givepermissions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
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
										<th>Permission</th>
										<th>E-mail</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($givepermissions as $givepermission)
                                        <tr>
                                            
											<td>{{ $givepermission->model_id }}</td>
											<td>{{ $givepermission->name }}</td>
											<td>

                                                @switch($givepermission->permission_id)
                                                    @case(1)
                                                    <div style="
                                                    color:white;
                                                    background-color:black;
                                                    width: 60%;
                                                    text-align: center;
                                                    border-radius: 100px; ">
    
                                                    <b>Index</b>
                                                    
                                                </div> 
                                                        @break
                                                    @case(2)
                                                    <div style="
                                                    color:white;
                                                    background-color:grey;
                                                    width: 60%;
                                                    text-align: center;
                                                    border-radius: 100px; ">
    
                                                    <b>Show</b>
                                                    
                                                </div> 
                                                        @break
                                                    @case(3)
                                                    <div style="
                                                    color:white;
                                                    background-color:purple;
                                                    width: 60%;
                                                    text-align: center;
                                                    border-radius: 100px; ">
    
                                                    <b>Store</b>
                                                    
                                                </div> 
                                                        @break
                                                    @case(4)
                                                    <div style="
                                                    color:white;
                                                    background-color:orange;
                                                    width: 60%;
                                                    text-align: center;
                                                    border-radius: 100px; ">
    
                                                    <b>Create</b>
                                                    
                                                </div> 
                                                        @break
                                                    @case(5)
                                                    <div style="
                                                    color:white;
                                                    background-color:blue;
                                                    width: 60%;
                                                    text-align: center;
                                                    border-radius: 100px; ">
    
                                                    <b>Update</b>
                                                    
                                                </div> 
                                                        @break
                                                    @case(6)
                                                    <div style="
                                                    color:white;
                                                    background-color:red;
                                                    width: 60%;
                                                    text-align: center;
                                                    border-radius: 100px; ">
    
                                                    <b>Delete</b>
                                                    
                                                </div> 
                                                        @break
                                                    @case(7)
                                                    <div style="
                                                    color:white;
                                                    background-color:orchid;
                                                    width: 60%;
                                                    text-align: center;
                                                    border-radius: 100px; ">
    
                                                    <b>Edit</b>
                                                    
                                                </div> 
                                                        @break        
                                                    @default
                                                        
                                                @endswitch


                                            </td>
											<td>{{ $givepermission->email }}</td>


                                            <td>
                                                <form action="{{ route('givepermissions.destroy',$givepermission->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('givepermissions.show',$givepermission->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('givepermissions.edit',$givepermission->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
