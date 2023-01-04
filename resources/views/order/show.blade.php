@extends('layouts.app')

@section('template_title')
    {{ $order->name ?? 'Show Order' }}
@endsection
@section('content')

    @if ($order->user_id === Auth::user()->id || Auth::user()->hasRole('Superadmin') || Auth::user()->hasRole('Admin'))

        <section class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">Show Order</span>
                            </div>
                            <div class="float-right">
                                @can('delete')
                                    <a class="btn btn-primary" href="/pedidos"> Back</a>
                                @endcan
                            </div>
                        </div>

                        <div class="card-body" style="background-color: #fff">
                            <div class="form-group">
                                <h1>Pedido: #{{ $order->id }}</h1>
                                
                                <form action="{{ route('print', $order->id) }}" method="POST" target="_blank">
                                @csrf
                                <button type="submit" class="btn-primary w3-hide-small" style="float: right"><i style="font-size: 15px" class="bi bi-filetype-pdf"></i> Guardar PDF</button>
                                </form>
                                
                                <h6>
                                    {{ 
                                       Carbon\Carbon::parse($order->created_at,'UTC')
                                       ->timezone('America/Mexico_City')
                                       ->isoFormat('LLLL')
                                    }}
                                </h6>
                            </div>
                            <div class="form-group">
                                {!! $order->products !!}
                            </div>
                            <h1>Codigo QR</h1>
                            <div class=" text-center">
                                {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate(Request::url()) !!}
                                <p>Scan me to return to the original page.</p>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="container col-md">
                                <center><h5>User Information</h5></center>

                                    
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
                                    <br>
                                </div>
                                <div class=" container col-md">
                                    <center><h5>Direccion</h5></center>

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

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <h2 class="container">
            Sin acceso
        </h2>
        <br>
        <br>
        <br>
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
