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
    <center><i  style='font-size: 300px; color:blueviolet' class=' fa '>&#xf058;</i></center>


    <p>Revisa los detalles de tu Pedido en <a href="/home">Tu Perfil</a></p>
    <p>O bien en tu correo electronico.</p>

    <br>
    <h5 style="color: blueviolet"><i>Esperamos cumplir pronto con tu Pedido!</i> </h5>





    



</div>
@endsection
