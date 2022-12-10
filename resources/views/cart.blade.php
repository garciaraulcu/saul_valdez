@extends('layouts.app')


@section('content')
    <main>
        <div class="container ">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p class="container">{{ $message }}</p>
                </div>
            @endif
           
            <div>
                <h3 class="float-left">Cart List</h3>

                <form action="{{ route('cart.clear') }}" method="POST" class=" float-right ">
                    @csrf
                    <button class="btn btn-secondary" > <i style="font-size: 20px; color:#fff" class="fa fa-trash"></i> Limpiar Todo</button>
                </form>

            </div>
            
            <div class="table-responsive">
            <hr>    
                <table >
                    <thead >
                        <tr >
                            <th>#</th>
                            <th></th>
                            <th>Articulo</th>
                            <th>
                                Cantidad
                            </th>
                            <th> Precio</th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\Cart::getContent() as $item)
                            <tr>
                                <td style="width: 2%"><b>{{ ++$i }}</b></td>
                                <td style="width: 10%;">
                                        <img style="width: 100%;" class="rounded" src="{{ $item->attributes->image }}">

                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    <div>
                                        <div>

                                            <form action="{{ route('cart.update') }}" method="POST">
                                                @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <input style="width: 40px" type="number" name="quantity"
                                                        value="{{ $item->quantity }}" />
                                                        <button class="btn btn-primary w3-hide-large w3-hide-medium" type="submit" style="width: 40px">
                                                            <i class="fa fa-refresh"></i>
                                                        </button>
                                                <button class="btn btn-primary w3-hide-small" type="submit">Actualizar</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>
                                        $ {{ $item->price }} 
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="btn btn-danger w3-hide-small">Eliminar</button>
                                        <button class="btn btn-danger w3-hide-large w3-hide-medium" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                        <tr class="w3-hide-small">
                            <td></td>
                            <td></td>
                            <td><h5 class="float-right">Total: </h5></td>
                            <td>
                                <h5><b>  {{ Cart::getTotalquantity() }} </b> {{ Cart::getTotalquantity() > 1 ? "Articulos"  : "Articulo"}} </h5>
                            </td>
                            <td><h5><b> $ {{ Cart::getTotal() }} MXN</b></h5></td>
                            <td></td>
                        </tr>                        

                    </tbody>

                </table>

            </div>
            <hr>
            <br>
            <div class="float-right w3-hide-large w3-hide-medium" >
                <h5><b>Total: $ {{ Cart::getTotal() }} MXN</b></h5>
                <h5><b> {{ Cart::getTotalquantity() }} </b> {{ Cart::getTotalquantity() > 1 ? "Articulos" : "Articulo"}}</h5>
            </div>
            <a href="{{ route('checkout') }}" class="btn btn-primary">
                Confirmar Pedido
            </a>
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
