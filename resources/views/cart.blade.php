@extends('layouts.app')


@section('content')
@if (\Cart::getTotalquantity() === 0)
    <div class="container">
        <h1 style="color:blueviolet">Ups!</h1>
        <h2>El Carrito esta Vacio.</h2>
        <br>
        <a href="/store" class="btn btn-secondary">Agrgar Productos al Carrito</a>
        <br>
        <br>
        <a href="/login">Iniciar Sesion</a>
        <br>
        <a href="/register">Registrarme</a>
        <br>
        <a href="/">Principal</a>
@else
    
<style>
    th{
        background-color: #ccc;
        color: #222;
        border: 1px solid black;
    }
    .hr{
        border-top: 1px solid black;
    }

</style>
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
                <table class="table-striped">
                    <thead >
                        <tr >
                            <th>#</th>
                            <th>Imagen</th>
                            <th >Nombre_de_Artuculo</th>
                            <th>Actualizar_Cantidad</th>
                            <th>Precio</th>
                            <th> Cantidad</th>
                            <!--<th> Subtotal</th>-->
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
                                                    <input type="number" name="quantity"       
                                                        value="{{ $item->quantity }}" min="1" max="{{ App\Product::find($item->id)->cantidad }}" />
                                                        <button class="btn btn-primary w3-hide-large w3-hide-medium" type="submit" style="width: 40px">
                                                            <i class="fa fa-refresh"></i>
                                                        </button>
                                                <button class="btn btn-primary w3-hide-small" type="submit">Actualizar</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>$ {{ $item->price }} </td>
                                <td> x{{ $item->quantity }} </td>
                                <!--<td>$ {{ $item->quantity*$item->price }} </td>-->
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
                        <tr class=" hr">
                            <td>
                                  
                            </td>
                            <td>    </td>
                            <td><b>Total: </b></td>
                            <td></td>
                            <td><b> $ {{ Cart::getTotal() }} MXN</b></td>
                            <td><b>  {{ Cart::getTotalquantity() }} </b> {{ Cart::getTotalquantity() > 1 ? "Articulos"  : "Articulo"}}</td>
                        </tr>                        

                    </tbody>

                </table>

            </div>
            <br>
            <a href="{{ route('checkout') }}" class="btn btn-primary">
                Confirmar Pedido
            </a>
        </div>
    </main>
    <br>
    <p class="container">
        <b>NOTA:</b> Los pedidos estan sujetos a la disponibilidad de productos.
    </p>
@endif
@endsection
