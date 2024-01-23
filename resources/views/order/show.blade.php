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
                                <span class="card-title">Información de Pedido</span>
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

                                <h6>
                                    {{ Carbon\Carbon::parse($order->created_at, 'UTC')->timezone('America/Mexico_City')->isoFormat('LLLL') }}
                                </h6>
                            </div>
                            <!--<h1>Codigo QR</h1>
                                    <div class=" text-center">
                                        {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate(Request::url()) !!}
                                        <p>Scan me to return to the original page.</p>
                                    </div>-->

                            
                            <div class="form-group">
                                <strong>Status:</strong>
                                {{ $order->status }}
                            </div>

                            <div class="form-group">

                                @switch($order->status)
                                    @case('Pagado')
                                        <div class="container p-3">
                                            <h4 class="bg-primary p-3 text-white">Gracias por tu Compra!</h4>

                                            <p>
                                                Ya puedes descargar tus productos en la tabla de este resumen.
                                            </p>
                                        </div>
                                    @break

                                    @case('En Envio')
                                        <div class="container">
                                            <h4>Tu Pedido esta en proceso de Envio!</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, impedit mollitia.
                                                Consequatur quas eaque ipsa nam provident, numquam ab tenetur reiciendis deleniti
                                                cumque eum corrupti quo tempora minima eveniet aliquid!
                                            </p>
                                        </div>
                                    @break

                                    @case('Cancelado')
                                        <div class="container">
                                            <h4>Tu Pedido ha sido Cancelado!</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, impedit mollitia.
                                                Consequatur quas eaque ipsa nam provident, numquam ab tenetur reiciendis deleniti
                                                cumque eum corrupti quo tempora minima eveniet aliquid!
                                            </p>
                                        </div>
                                    @break

                                    @case('Pendiente de Pago')
                                        <div class="container">
                                            @if ($order->paymentmethod === 'Efectivo')
                                                <div class="container card-body card" style="background-color: #f2f2f2">
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
                                                        Realiza una transferencia desde tu app de banco al siguiente numero de
                                                        Cuenta:


                                                    <ul>
                                                        <li>Cuenta: <b>25008141576</b></li>
                                                        <li>Banco: <b>Santander</b></li>
                                                        <li>Concepto: <b>P-{{ $order->id }}</b></li>
                                                    </ul>

                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    @break

                                    @default
                                        <div class="container">
                                            @if ($order->paymentmethod === 'Efectivo')
                                                <div class="container card-body card bg-secondary" style="background-color: #f2f2f2">
                                                    <h4 class="text-white"><b>Pendiente de Pago</b></h>
                                                    
                                                </div>
                                            @else
                                                <div class="container card-body card">
                                                    <h4><b>Transferencia</b></h4>
                                                    <p>
                                                        Realiza una transferencia desde tu app de banco al siguiente numero de
                                                        Cuenta:


                                                    <ul>
                                                        <li>Cuenta: <b>25008141576</b></li>
                                                        <li>Banco: <b>Santander</b></li>
                                                        <li>Concepto: <b>P-{{ $order->id }}</b></li>
                                                    </ul>

                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                @endswitch
                            </div>
                            <hr>
                            <div class="container">
                                <!--<form action="{{ route('print', $order->id) }}" method="POST" target="_blank">
                                    @csrf
                                    <button type="submit" class="btn-primary w3-hide-small" style="float: right"><i
                                                style="font-size: 15px" class="bi bi-filetype-pdf"></i>
                                                Guardar PDF
                                    </button>
                                </form>-->
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>id</th>
                                            <th>Productos</th>
                                            <th>Precio</th>
                                            <th>Desarga</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderResume as $item)
                                                <tr>
                                                    <td>{{ $item->id_products }}</td>
                                                    <td>{{ App\Product::find($item->id_products) ? App\Product::find($item->id_products)->name : "Articulo Eliminado" }}</td>
                                                    <td>{{ App\Product::find($item->id_products) ? App\Product::find($item->id_products)->price . "MXN" : "Articulo Eliminado" }}</td>
                                                    <td>
                                                        @if ($order->status === 'Pagado')
                                                            <a href="{{ App\Product::find($item->id_products) ? App\Product::find($item->id_products)->link_download : "" }}"
                                                                target="_blank" class="btn btn-secondary">
                                                                Descargar <i class="fa fa-download"></i>
                                                            </a>
                                                        @else
                                                            Pendiente
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>-</td>
                                                <td>Total</td>
                                                <td><b>$ {{ $order->total }} MXN</b></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="">
                                    @if ($order->status != "Pagado")
                                    <form action="{{ route('session',$order->id) }}" method="POST">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        
                                        <button class="btn btn-primary" type="submit" >
                                            <b>Realizar Pago</b>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="container col-md">
                                    <center>
                                        <h5>User Information</h5>
                                    </center>


                                    <div class="">
                                        <strong>Name:</strong>
                                        {{ App\Models\User::find($order->user_id) ? App\Models\User::find($order->user_id)->name : 'No Existe Ususario' }}
                                    </div>
                                    <!--<div class="">
                                        <strong>Phone:</strong>
                                        {{ $order->phone }}
                                    </div>-->
                                    <div class="">
                                        <strong>Email:</strong>
                                        {{ App\Models\User::find($order->user_id) ? App\Models\User::find($order->user_id)->email : 'No Existe Correo de Ususario' }}
                                    </div>
                                    <br>
                                </div>
                                <div class=" container col-md">
                                    <center>
                                        <h5>Direccion</h5>
                                    </center>

                                    <!--<div class="">
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
                                    </div>-->
                                    <div class="">
                                        <strong>City: </strong>
                                        {{ $order->city }}
                                    </div>
                                    <!--<div class="">
                                        <strong>State: </strong>
                                        {{ $order->state }}
                                    </div>
                                    <div class="">
                                        <strong>Postcode: </strong>
                                        {{ $order->postcode }}
                                    </div>-->
                                    <div class="">
                                        <strong>Country: </strong>
                                        {{ $order->country }}
                                    </div>
                                </div>

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
