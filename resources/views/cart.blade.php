@extends('layouts.app')


@section('content')
    <main>
        <div class="container ">
            @if ($message = Session::get('success'))
                <div >
                    <p >{{ $message }}</p>
                </div>
            @endif
           
            <h3>Cart List</h3>
            <div>
                
                <table class="table-sm">
                    <thead >
                        <tr >
                            <th>#</th>
                            <th></th>
                            <th>Articulo</th>
                            <th>
                                Cantidad
                            </th>
                            <th> Precio</th>
                            <th> Del </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\Cart::getContent() as $item)
                            <tr>
                                <td style="width: 1%">{{ ++$i }}</td>
                                <td style="width: 15%">
                                    <a href="#">
                                        <img style="width: 100%" class="rounded" src="{{ $item->attributes->image }}">
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <p>{{ $item->name }}</p>

                                    </a>
                                </td>
                                <td>
                                    <div>
                                        <div>

                                            <form action="{{ route('cart.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input style="width: 50px" type="number" name="quantity"
                                                    value="{{ $item->quantity }}" />
                                                <button class="btn btn-primary" type="submit">Actualizar</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>
                                        $ {{ $item->price }} MXN
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="btn btn-danger">Eliminar</button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                        <hr>
                        

                    </tbody>

                </table><hr>

                <div style="float: right; margin-right:15%" >
                    <h5><b>Total: $ {{ Cart::getTotal() }} MXN</b></h5>
                </div><br>

                <div>

                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button class="btn btn-warning" >Limpiar Todo</button>
                    </form>
    
                </div>

                <a href="{{ route('checkout') }}" style="float: right" class="btn btn-primary">

                    Confirmar Pedido
                </a>


            </div>
        </div>
    </main>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
