@extends('layouts.app')

@section('content')
<div class="container">

    @if ( Auth::user()->hasRole('Superadmin') || Auth::user()->hasRole('Admin'))
    <h2 style="color: blueviolet">Pedidos</h2><br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <th>Pedido</th>
                <th>User</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Hace</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach (App\Order::all()->sortByDesc('id') as $item)
                    <tr>
                        <td>#{{ $item->id }}</td>
                        <td>{{ App\Models\User::find($item->user_id) ? App\Models\User::find($item->user_id)->name : "No Existe Usuario"}}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->created_at->diffForHumans() }}</td>
                        <td><a class="btn btn-secondary" href="{{ route('orders.show',$item->id) }}">Ver</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>        
    @else
        <h2 class="container">
            Sin Acceso
        </h2>
    @endif
    <br>
    <br>
    <br>
    <br>
    <br>

</div>
@endsection
