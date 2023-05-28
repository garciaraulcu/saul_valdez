@extends('layouts.app')


@section('content')
    <style>
        .flex-container {
            display: flex;
            flex-direction: row;
        }

        .flex-item-left {
            flex: 30%;
        }

        .flex-item-right {
            flex: 70%;
        }

        /* Responsive layout - makes a one column-layout instead of two-column layout */
        @media (max-width: 800px) {
            .flex-container {
                flex-direction: column-reverse;
            }
        }
    </style>

    <div class="container">
        <h2 style="color: blueviolet;">Checkout  </h2>
    </div>
    <br>
    @if (Auth::check())
    @if (\Cart::getTotalquantity() > 0)
    <div class="container">
        <div class="flex-container">
            <div class="flex-item-right">



                <div class="container">
                    <form method="POST" action="{{ route('orders.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <div class="form-row container">
                                <div class="form-group col-md-5">
                                    <label for="street">Calle</label>
                                    <input name="street" required  class="form-control" id="inputCity" >
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="num">Numero</label>
                                    <input name="num" required   class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="colonia">Colonia</label>
                                    <input name="colonia" required   class="form-control" id="inputCity" >
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="city">Ciudad / Municipio</label>
                                    <input name="city" required   class="form-control" id="inputCity" >
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="state">Estado</label>
                                    <input name="state" required  class="form-control">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="country">Pais</label>
                                    <input name="country" id="pais" required   placeholder="Pais" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="postcode">Codigo Postal</label>
                                    <input name="postcode" required   class="form-control" id="inputZip" placeholder="Ej. 90210">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="phpne">Telefono *</label>
                                    <input name="phone" required   class="form-control" id="phone" >
                                </div>
                            </div>
                        </div>


                        <p><b>Selecciona un Metodo de Pago</b></p>
                        <div class="form-group">
                            <label for="payment">Formas de Pago</label>
                            <select name="paymentmethod" id="payment" required>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Transferencia">Transferencia</option>
                            </select>
                        </div>

                        <br>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                <label class="form-check-label" for="gridCheck">
                                    Acepto los <a href="">Terminos y Condiciones de uso.</a> *
                                </label>
                            </div>
                        </div>

                        <input name="status" type="hidden" value="Realizado">
                        <input name="total" type="hidden" value="{{ Cart::getTotal() }}">
                        <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">

                        <input name="products" type="hidden"
                            value="
                            <div style='overflow-x:auto;' >
                                <table class='table table-striped'>
                                    <thead style='background-color: #222; color:#fff'>
                                        <th>id</th>
                                        <th>Productos</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>
                                        @foreach (\Cart::getContent() as $item)
                                        <tr>
                                            <td>{{ $item->id }} </td>
                                            <td>{{ $item->name }} </td>
                                            <td>$ {{ $item->price }} </b></td>
                                            <td>x<b>{{ $item->quantity }}</b></td>
                                            <td>$ {{ $item->price*$item->quantity }} </b></td>
                                        </tr>
                                        @endforeach
                                        <tr class='w3-hide-small'>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td >
                                                <b>
                                                    {{ \Cart::getTotalquantity() }} 
                                                    {{ \Cart::getTotalquantity() > 1 ? "Articulos" : "Articulo" }}
                                                </b>
                                            </td>
                                            <td > <b>$ {{ \Cart::getTotal() }} MXN</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h3 class='w3-hide-medium w3-hide-large float-right'>Total: <b>$ {{ \Cart::getTotal() }} MXN</b></h3>
                            <br>
                            ">

                        <button type="submit" class="btn btn-primary">Realizar Pedido</button>
                    </form>
                </div>
            </div>
            <div class="flex-item-left">
                <h5><b>Resumen</b></h5>
                <hr>
                <div class="container">
                    <table>
                        <thead>
                            <th></th>
                            <th>Articulo</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($checkoutItems as $item)
                                <tr>
                                    <td style="width: 30%">
                                        <img src="{{ $item->attributes->image }}" alt="{{ $item->name }}"
                                            style="width: 100%;">
                                    </td>
                                    <td style="width: 50%">
                                        <small>{{ $item->name }}</small>
                                    </td>
                                    <td style="width: 20%; text-aling: center">
                                        <small>${{ $item->price }} MXN</small>

                                    </td>
                                    <td style="text-align: left" class=" text-center">
                                        <small>x{{ $item->quantity }}</small>
                                    </td>
                                    <td style="text-align: left">
                                        <small>$ {{ $item->quantity*$item->price }} MXN</small>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div>
                        <div style="float: left">
                            <a style="color: black" href="{{ route('cart.list') }}">
                                <i style="font-size: 20px" class="bi bi-cart-fill"></i>
                                {{ Cart::getTotalQuantity() }}
                            </a>
                        </div>
                        <div style="float: right">
                            <h4>
                                <b>Total: $ {{ Cart::getTotal() }} MXN</b>
                            </h4>
                        </div>
                    </div>
                    <br>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="container">
            <h2 style="color:blueviolet">Ups! tu carrito esta vacio</h2>
            <p>Por Favor Agrega uno o Varios Artículos para mostrar la lista de Compras y continuar con el pedido.</p>
            <a href="/store" class="btn btn-secondary">Agregar Productos <i class="fa fas-cart"></i></a>
        </div>
    @endif
    @else
    <div class="container">
        <h2>Para realizar Pedidos <a href="/login">Inicia Sesion</a></h2>
        <p>
            <a href="/login">Ya tengo una Cuenta</a>
        </p>
        <p>
            Aun NO tienes una Cuenta? <a href="/register">Registrate</a>
        </p>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    @endif
@endsection
