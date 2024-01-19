@extends('layouts.app')

@section('template_title')
    Order
@endsection

@section('content')
@if (Auth::user()->hasRole('Superadmin'))
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Order') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('orders.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                <th>No</th>
                                
                                <th>User Id</th>
                                <th>Total</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Paymentmethod</th>
                                <th>Status</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>#{{ ++$i }}</td>
                                    
                                    <td>{{ App\Models\User::find($order->user_id) ? App\Models\User::find($order->user_id)->name : "No Existe" }}</td>
                                    <td>$ {{ $order->total }} MXN</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ App\Models\User::find($order->user_id) ? App\Models\User::find($order->user_id)->email : "No Existe" }}</td>
                                    <td>{{ $order->paymentmethod }}</td>
                                    <td>{{ $order->status }}</td>

                                    <td>
                                        <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('orders.show',$order->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('orders.edit',$order->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
@else
    <div class="container">
            <h1 style="color: blueviolet">Ups!</h1>
            <br>
            <p>
                La sesion de Compra ha trminado. Revisa tu perfil para ver tus peditos 
            </p>
            <a href="/store" class="btn btn-primary">Volver a la Tienda</a>
    </div>
    <br>
    <br>
@endif
@endsection
