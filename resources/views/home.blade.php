@extends('layouts.app')

@section('content')
<div class="container">
    
    <br>

    <h5>Mis Pedidos</h5>
    <table class="table table-striped" style="">
        <thead class="thead-dark">
            <th>Pedido</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach (App\Order::all()->where('user_id',Auth::user()->id) as $item)
            <tr>
                <td>#{{ $item->id }}</td>
                <td><a href="{{ route('orders.show',$item->id) }}">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @can('delete')
    <a href="/roles">Crear Roles</a>
    <br>
    <a href="/giveroles">Asignar Roles</a>
    <br>
    <a href="/givepermissions">Asignar Permisos</a>
    <br>
    <a href="/productos">Productos</a>
    <br>
    <a href="/pedidos">Pedidos</a>
    <br>
    <a href="/orders">Editar Pedidos</a>
    @endcan
</div>
@endsection
