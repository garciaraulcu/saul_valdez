@extends('layouts.app')

@section('template_title')
    {{ $order->name ?? 'Show Order' }}
@endsection

@section('content')
    <section class="content container-fluid">
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

                    <div class="card-body" style="background-color: #f2f2f2">
                        <div class="form-group">
                            <h1>Pedido: #{{ $order->id }}</h1>
                        </div>
                        <div class="form-group">
                            <strong>Products:</strong>
                            {!! $order->products !!}
                        </div>
                        <div class="form-group float-right">
                            <h5>Total: <b>$ {{ $order->total }} MXN</b></h5>
                        </div>
                        <br>
                        @can('delete')
                        <h5>User Information</h5>
                        <div class="container">
                            <div class="">
                                <strong>User Id:</strong>
                                {{ $order->user_id }}
                            </div>
                            <div class="">
                                <strong>Name:</strong>
                                {{ $order->name }} {{ $order->lastname }}
                            </div>
                            <div class="">
                                <strong>Phone:</strong>
                                {{ $order->phone }}
                            </div>
                            <div class="">
                                <strong>Email:</strong>
                                {{ $order->email }}
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
                        @endcan
                        <div class="form-group">
                            <strong>Paymentmethod:</strong>
                            {{ $order->paymentmethod }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $order->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
