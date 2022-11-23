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
    <div class="container">
        <div class="flex-container">
            <div class="flex-item-right">
                <h5><b>Datos de Envio</b></h5>
                <div class="container">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nombre *</label>
                                <input required type="text" class="form-control" id="name"  value=" @if(Auth::check()) {{ Auth::User()->name }} @endif ">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Telefono *</label>
                                <input required type="text" class="form-control" id="phone" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electronico </label>
                            <input type="email" class="form-control" id="email" placeholder="user@example.com" value=" @if(Auth::check()) {{ Auth::User()->email }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="address">Direccion *</label>
                            <textarea required style="width: 100%" name="address" id="address" cols="100" rows="3" placeholder="Ej. Av. Insurgentes #235, Col. Del Valle"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Ciudad</label>
                                <input required type="text" class="form-control" id="inputCity" placeholder="Tuxtla Gutierrez">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Estado</label>
                                <input required type="text" placeholder="Chiapas" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Codigo Postal</label>
                                <input required type="text" class="form-control" id="inputZip" placeholder="C.P 90212">
                            </div>
                        </div>

                        <div class="container">
                            <br>
                            <p><b>Formas de Pago</b></p>
                            <div>
                                <input class="form-check-input"  type="checkbox" name="pay-method" value="efectivo">
                                <label for="efectivo">Efectivo</label>
                            </div>
                            <div>
                                <input class="form-check-input"  type="checkbox" name="pay-method" value="transferencia">
                                <label for="transferencia">Transferencia Bancaria</label>
                            </div>
                            <div>
                                <input class="form-check-input"  type="checkbox" name="pay-method" value="paypal">
                                <label for="paypal">Pay Pal</label>
                            </div>
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
                        <button type="submit" class="btn btn-primary">Realizar Pago</button>
                    </form>
                </div>
            </div>
            <div class="flex-item-left">
                <h5><b>Resumen</b></h5><hr>
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
                                    <img src="{{ $item->attributes->image }}" alt="{{ $item->name }}" style="width: 100%;"> 
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
                                <i style="font-size: 20px"  class="bi bi-cart-fill"></i>
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
                    <br><hr>
                </div>
            </div>
        </div>
    </div>
@endsection
