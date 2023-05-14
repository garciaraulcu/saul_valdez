<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedido {{ $order->id }} </title>

    <style>
        .font-family {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
        }
    </style>


</head>

<body class="font-family">
    <table style="width: 100%">
        <td>
            <h1>Pedido: #{{ $order->id }} </h1>
            <h5>{{ Carbon\Carbon::parse($order->created_at, 'UTC')->timezone('America/Mexico_City')->isoFormat('LLLL') }}
            </h5>

            {!! $order->products !!}
        </td>
        <td>
            <br>
            <small style="font-size: 10px">Escanea éste codigo QR para volver al resumen de tu pedido</small>
            <br><br><br>
            <img style="padding-left: 70px" src="data:image/png;base64, 
        {!! base64_encode(
            QrCode::format('png')->size(150)->generate(Request::root() . '/orders/' . $order->id),
        ) !!} ">
        </td>
    </table>


    <table style="width: 100%">
        <thead style="background-color: #ccc">
            <th>Contacto</th>
            <th>Dirección</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <strong>Name:</strong>
                    {{ App\Models\User::find($order->user_id) ? App\Models\User::find($order->user_id)->name : 'No Existe Ususario' }}
                    <br>
                    <strong>Phone:</strong>
                    {{ $order->phone }}
                    <br>
                    <strong>Email:</strong>
                    {{ App\Models\User::find($order->user_id) ? App\Models\User::find($order->user_id)->email : 'No Existe Correo de Ususario' }}
                </td>
                <td>
                    <br>
                    <strong>Street: </strong>
                    {{ $order->street }}
                    <br>
                    <strong>Num:</strong>
                    {{ $order->num }}
                    <br>
                    <strong>Colonia: </strong>
                    {{ $order->colonia }}
                    <br>
                    <strong>City: </strong>
                    {{ $order->city }}
                    <br>
                    <strong>State: </strong>
                    {{ $order->state }}
                    <br>
                    <strong>Postcode: </strong>
                    {{ $order->postcode }}
                    <br>
                    <strong>Country: </strong>
                    {{ $order->country }}
                </td>
            </tr>
        </tbody>
    </table>

    <div class="form-group">
        <strong>Forma de Pago:</strong>
        {{ $order->paymentmethod }}
    </div>
    <div class="form-group">
        <strong>Status:</strong>
        {{ $order->status }}
    </div>
    <br>
    <hr>

    <div class="form-group">
        <br><br>
        @switch($order->status)
            @case('Entregado')
                <div class="container" style="background-color: blueviolet; color:aqua; padding:10px">
                    <h4>Hemos entregado tu pedido con Exito!</h4>

                    <p>
                        Ya puedes descargar tus productos del Pedido en la tabla de resumen 
                    </p>

                </div>
            @break

            @case('En Envio')
                <div class="container">
                    <h4>Tu Pedido esta en proceso de Envio!</h4>

                </div>
            @break

            @case('Cancelado')
                <div class="container">
                    <h4>Tu Pedido ha sido Cancelado!</h4>

                </div>
            @break

            @case('Pendiente de Pago')
                <div class="container">
                    <div class="container">
                        @if ($order->paymentmethod === 'Efectivo')
                            <div class="container card-body card">
                                <h4><b>Pago en Efectivo</b></h4>
                                <p>
                                    Realiza el Deposito en tiendas de conveniencia como:
                                <ul>
                                    <li>OXXO</li>
                                    <li>Farmacias Similares</li>
                                    <li>7 Eleven</li>
                                </ul>

                                </p>
                            </div>
                        @else
                            <div class="container card-body card">
                                <h4><b>Transferencia</b></h4>
                                <p>
                                    Realiza una transferencia desde tu app de banco al siguiente numero de Cuenta:


                                <ul>
                                    <li>Cuenta: <b>25008141576</b></li>
                                    <li>Banco: <b>Santander</b></li>
                                    <li>Concepto: <b>{{ $order->id }}</b></li>
                                </ul>

                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            @break

            @default
                <div class="container">
                    @if ($order->paymentmethod === 'Efectivo')
                        <div class="container card-body card">
                            <h4><b>Pago en Efectivo</b></h4>
                            <p>
                                Realiza el Deposito en tiendas de conveniencia como:
                            <ul>
                                <li>OXXO</li>
                                <li>Farmacias Similares</li>
                                <li>7 Eleven</li>
                            </ul>

                            </p>
                        </div>
                    @else
                        <div class="container card-body card">
                            <h4><b>Transferencia</b></h4>
                            <p>
                                Realiza una transferencia desde tu app de banco al siguiente numero de Cuenta:


                            <ul>
                                <li>Cuenta: <b>25008141576</b></li>
                                <li>Banco: <b>Santander</b></li>
                                <li>Concepto: <b>{{ $order->id }}</b></li>
                            </ul>

                            </p>
                        </div>
                    @endif
                </div>
        @endswitch
    </div>
</body>

</html>
