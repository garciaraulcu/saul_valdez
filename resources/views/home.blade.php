@extends('layouts.app')

@section('content')
<div class="container">
    
    <br>

    <h5>Mis Pedidos</h5>
    <div class="table-responsive">
        <table class="table table-striped" style="">
            <thead class="thead-dark">
                <th>Pedido Id</th>
                <th>Status</th>
                <th>Hace</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach (App\Order::all()->where('user_id',Auth::user()->id)->sortByDesc('id') as $item)
                <tr>
                    <td>#{{ $item->id }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td><a class="btn btn-secondary" href="{{ route('orders.show',$item->id) }}">Ver</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @can('delete')
    <a href="/roles">Crear Roles</a>
    <br>
    <a href="/giveroles">Asignar Roles</a>
    <br>
    <a href="/givepermissions">Asignar Permisos</a>
    <br>
    <a href="/products">Productos</a>
    <br>
    <a href="/pedidos">Pedidos</a>
    <br>
    <a href="/orders">Editar Pedidos</a>
    <br>
    <a href="/categorias">Categorias</a>
    @endcan

    @if (Auth::user()->hasRole('Admin'))
        <h3>For Admins</h3>
    <a href="/pedidos">Pedidos</a>
    <br>


    @endif
</div>
@endsection
