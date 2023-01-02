<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedido  {{ $order->id }} </title>
  
    

</head>
<body style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
    <h1>Pedido: #{{ $order->id }} </h1>
    <h5>{{ Carbon\Carbon::parse($order->created_at,'UTC')->timezone('America/Mexico_City')->isoFormat('LLLL') }}</h5>

        {!! $order->products !!}

        <hr>
        
        <h5>User Information</h5>
                                <div class="container">
                                    
                                    <div class="">
                                        <strong>Name:</strong>
                                        {{ App\Models\User::find($order->user_id) ? App\Models\User::find($order->user_id)->name : "No Existe Ususario" }} 
                                    </div>
                                    <div class="">
                                        <strong>Phone:</strong>
                                        {{ $order->phone }}
                                    </div>
                                    <div class="">
                                        <strong>Email:</strong>
                                        {{ App\Models\User::find($order->user_id) ? App\Models\User::find($order->user_id)->email : "No Existe Correo de Ususario" }}
                                    </div>
                                </div>
                                <h5>Direccion</h5>
                                <div class=" container">
                                    <div class="">
                                        <strong>Street: </strong>
                                        {{ $order->street }}
                                    </div>
                                    <div class="">
                                        <strong>Num:</strong>
                                        {{ $order->num }}
                                    </div>
                                    <div class="">
                                        <strong>Colonia: </strong>
                                        {{ $order->colonia }}
                                    </div>
                                    <div class="">
                                        <strong>City: </strong>
                                        {{ $order->city }}
                                    </div>
                                    <div class="">
                                        <strong>State: </strong>
                                        {{ $order->state }}
                                    </div>
                                    <div class="">
                                        <strong>Postcode: </strong>
                                        {{ $order->postcode }}
                                    </div>
                                    <div class="">
                                        <strong>Country: </strong>
                                        {{ $order->country }}
                                    </div>
                                </div><br>
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
                                        <div class="container">
                                            <h4>Hemos entregado tu pedido con Exito. Gracias por tu preferencia!</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, impedit mollitia. Consequatur quas eaque ipsa nam provident, numquam ab tenetur reiciendis deleniti cumque eum corrupti quo tempora minima eveniet aliquid!
                                            </p>
                                        </div>
                                        @break
                                    @case('En Envio')
                                    <div class="container">
                                        <h4>Tu Pedido esta en proceso de Envio!</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, impedit mollitia. Consequatur quas eaque ipsa nam provident, numquam ab tenetur reiciendis deleniti cumque eum corrupti quo tempora minima eveniet aliquid!
                                        </p>
                                    </div>
                                        @break
                                    @case('Cancelado')
                                    <div class="container">
                                        <h4>Tu Pedido ha sido Cancelado!</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, impedit mollitia. Consequatur quas eaque ipsa nam provident, numquam ab tenetur reiciendis deleniti cumque eum corrupti quo tempora minima eveniet aliquid!
                                        </p>
                                    </div>
                                    @break
                                    @case('Pendiente de Pago')
                                    <div class="container">
                                        <h4>Realiza el pago para continuar con el envio.</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, impedit mollitia. Consequatur quas eaque ipsa nam provident, numquam ab tenetur reiciendis deleniti cumque eum corrupti quo tempora minima eveniet aliquid!
                                        </p>
                                    </div>
                                    @break
                                    @default
                                    <div class="container">
                                        <h4>Gracias por tu pedido!  </h4>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, impedit mollitia. Consequatur quas eaque ipsa nam provident, numquam ab tenetur reiciendis deleniti cumque eum corrupti quo tempora minima eveniet aliquid!
                                        </p>
                                    </div>
                                @endswitch
                            </div>
</body>
</html>

