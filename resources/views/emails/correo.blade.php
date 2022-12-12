<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="container">
    <center>    <h1>Resumen de tu Pedido</h1></center>


    


    <div class='table-responsive'>
        <table class='table table-striped'>
            <thead style='background-color: #222; color:#fff'>
                <th>id</th>
                <th>Productos</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </thead>
            <tbody>
                @foreach (\Cart::getContent() as $item)
                <tr>
                    <td>{{ $item->id }} </td>
                    <td>{{ $item->name }} </td>
                    <td>$ {{ $item->price }} </b></td>
                    <td>x<b>{{ $item->quantity }}</b></td>
                    <td>$ {{ $item->price*$item->quantity }} </b></td>
                </tr>
                @endforeach
                <tr class='w3-hide-small'>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td >
                        <b>
                            {{ \Cart::getTotalquantity() }} 
                            {{ \Cart::getTotalquantity() > 1 ? "Articulos" : "Articulo" }}
                        </b>
                    </td>
                    <td ><h5>Total: <b>$ {{ \Cart::getTotal() }} MXN</b></h5></td>
                </tr>
            </tbody>
        </table>
    </div>
    <h3 class='w3-hide-medium w3-hide-large float-right'>Total: <b>$ {{ \Cart::getTotal() }} MXN</b></h3>
    <br>
    <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem, nostrum! Deleniti facere debitis impedit aliquam pariatur labore atque hic perspiciatis? Magni incidunt et dolore officiis quaerat, dolorem debitis id unde.
    </p>
</body>
</html>