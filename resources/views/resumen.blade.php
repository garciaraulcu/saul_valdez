@extends('layouts.app')

@section('content')
    <div class="container">

        @if (empty($order))
            <br>
            <div >
                <h2 style="color: blueviolet">Ups!</h2>
                <h4>No se han agregado productos al Carrito.</h4>
                <br>
                <a href="/store" class="btn btn-secondary">Agregar Productos</a>
                <br>
                <br>
                <br>
                <br>
            </div>
        @else
        <h2 style="color: blueviolet;">Hemos Recibido tu Pedido. Gracias!</h2>
        <p>Para continuar Revisa las instrucciones que hemos enviado a tu correo para continual con el pago.</p>
        <br>
        <center><i style='font-size: 300px; color:blueviolet' class=' fa '>&#xf058;</i></center>


        <p>Revisa los detalles de tu Pedido en <a href="/home">Tu Perfil</a></p>
        <p>O bien en tu correo electronico.</p>

        <br>
        <h5 style="color: blueviolet"><i>Esperamos cumplir pronto con tu Pedido!</i> </h5>
        @endif


    </div>
@endsection
