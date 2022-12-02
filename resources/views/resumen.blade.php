@extends('layouts.app')

@section('content')
<div class="container">
    @if ($message = Session::get('msgpedido'))
    <div class="alert alert-success">
        <p class=" container">{{ $message }}</p>
    </div>
@endif
    <h2 style="color: blueviolet;">Hemos Recibido tu Pedido. Gracias!</h2>
    <p>Para continuar Revisa las instrucciones que hemos enviado a tu correo para continual con el pago.</p>
    <br>

    <h1>Pedido: # {{ App\Order::all('id')->count() }}</h1>

    <br>
    <h3 style="color: blueviolet"><i>Esperamos cumplir pronto con tu Pedido!</i> </h3>

    <br>
    <br>
    <br>
    <br>


    



</div>
@endsection
