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
        <h2 style="color: blueviolet;">Checkout</h2>
    </div>
    <br>
    @if (Auth::check())
    <div class="container">
        <div class="flex-container">
            <div class="flex-item-right">
                <h5><b>Datos de Envio</b></h5>
                <div class="container">
                    <form method="POST" action="{{ route('orders.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">Telefono *</label>
                                <input name="phone" required type="text" class="form-control" id="phone"
                                    placeholder="+52 55 12345678">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">Calle</label>
                                <input name="street" required type="text" class="form-control" id="inputCity" placeholder="Calle">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">Numero</label>
                                <input name="num" required type="text" class="form-control" id="inputCity" placeholder="Numero">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">Colonia</label>
                                <input name="colonia" required type="text" class="form-control" id="inputCity" placeholder="Colonia">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">Ciudad</label>
                                <input name="city" required type="text" class="form-control" id="inputCity" placeholder="Ciudad">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Estado</label>
                                <input name="state" required type="text" placeholder="Estado" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="pais">Pais</label>
                                <input name="country" id="pais" required type="text" placeholder="Pais" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Codigo Postal</label>
                                <input name="postcode" required type="text" class="form-control" id="inputZip" placeholder="Ej. 90210">
                            </div>
                        </div>


                        <br>
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
                            <div class='table-responsive'>
                                <table class='table table-striped'>
                                    <thead style='background-color: #222; color:#fff'>
                                        <th>Productos</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                    </thead>
                                    <tbody>
                                        @foreach (\Cart::getContent() as $item)
                                        <tr>
                                            <td>{{ $item->name }} </td>
                                            <td>$ {{ $item->price }} </b></td>
                                            <td>x<b>{{ $item->quantity }}</b></td>
                                            <td>$ {{ $item->price*$item->quantity }} </b></td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td ><b>{{ \Cart::getTotalquantity() }} Articulos</b></td>
                                            <td ><h5>Total: <b>$ {{ \Cart::getTotal() }} MXN</b></h5></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
                            <th>Cant</th>
                            <th></th>
                            <th>Articulo</th>
                            <th>Precio</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($checkoutItems as $item)
                                <tr>
                                    <td style="text-align: left">
                                        x{{ $item->quantity }}
                                    </td>
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
                                <b>
                                    Total: $ {{ Cart::getTotal() }} MXN
                                </b>
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
