@extends('layouts.app')


@section('content')
    <style>



    </style>

    <div class="container">
        <h2 style="color: blueviolet;">Información de Usuario </h2>
        <br>
        @if (Auth::check())
            @if (\Cart::getTotalquantity() > 0)
                <div class="">
                    <div class="row">
                        <div class="col-md-7">



                            <div class="container">
                                <form method="POST" action="{{ route('orders.store') }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group">
                                        <div class="form-row container">
                                            <div class="form-group col-md-7">
                                                <!--<label for="street">Calle</label>-->
                                                <input type="hidden" name="street" required class="form-control" id="inputCity" value="null">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <!--<label for="num">Numero</label>-->
                                                <input type="hidden" name="num" required class="form-control" id="inputCity" value="null">
                                            </div>
                                                <input type="hidden" name="colonia" required class="form-control" id="inputCity" value="null">
                                            <div class="form-group col-md-5">
                                                <label for="city">Ciudad </label>
                                                <input name="city" required class="form-control" id="inputCity">
                                            </div>
                                                <!--<label for="state">Estado</label>-->
                                                <input type="hidden" name="state" required class="form-control" value="null">
                                            <div class="form-group col-md-5">
                                                <label for="country">Pais</label>
                                                <input name="country" id="pais"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <!--<label for="postcode">Codigo Postal</label>-->
                                                <input type="hidden" name="postcode" required class="form-control" id="inputZip"
                                                    placeholder="Ej. 90210" value="null">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <!--<label for="phpne">Telefono *</label>-->
                                                <input type="hidden" name="phone" required class="form-control" id="phone" value="null">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="paymentmethod" value="Efectivo">    
                                    <!--<p><b>Selecciona un Metodo de Pago</b></p>
                                    <div class="form-group">
                                        <label for="payment">Formas de Pago</label>
                                        <select name="paymentmethod" id="payment" required>
                                            <option value="Efectivo">Efectivo</option>
                                            <option value="Transferencia">Transferencia</option>
                                        </select>
                                    </div>-->

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
                                            <td>$ {{ $item->price * $item->quantity }} </b></td>
                                        </tr>
@endforeach
                                        <tr class='w3-hide-small'>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td >
                                                <b>
                                                    {{ \Cart::getTotalquantity() }} 
                                                    {{ \Cart::getTotalquantity() > 1 ? 'Articulos' : 'Articulo' }}
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
                        <div class="col-md-4">
                            <h5><b>Resumen</b></h5>
                            <hr>
                            <div class="w-100">
                                <table class="w-100">
                                    <thead>
                                        <th></th>
                                        <th>Articulo</th>
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
                                                <td style="width: 100%">
                                                    <small>{{ $item->name }}</small>
                                                </td>

                                                <td style="text-align: left" class=" text-center">
                                                    <small>x{{ $item->quantity }}</small>
                                                </td>
                                                <td style="text-align: left">
                                                    <small>$ {{ $item->quantity * $item->price }} </small>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <div>
                                    <div style="float: right">
                                        <h5>
                                            <b>Total: $ {{ Cart::getTotal() }} MXN</b>
                                        </h5>
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
                    <p>Por Favor Agrega uno o Varios Artículos para mostrar la lista de Compras y continuar con el pedido.
                    </p>
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
    </div>

@endsection
