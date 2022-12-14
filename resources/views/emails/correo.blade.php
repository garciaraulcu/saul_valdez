<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .bg-card {
            background-color: #FFFFFF;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4);
        }

        .container {
            margin-left: 5%;
            margin-right: 5%;
        }

        th{
            padding: 15px;
        }
        td{
            padding: 12px;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 90%;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>

</head>

<body style="background-color: #f2f2f2; font-family: 'Helvetica';" >
<br>
        <center><h3><a href="{{ config('app.name') }}" style="text-decoration: none">Mercado FES</a></h3></center>
    <div class="bg-card container">
        <br>
        <h1 style="margin-left: 5%;">Pedido: #{{ $pedido }}</h1>
            <div >
                <center>
                    {!! $content !!}
                </center>
            </div>
    </div>
    <br>

    <p class="container">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta, accusantium provident? Soluta accusamus aspernatur veniam autem sapiente! Animi autem asperiores officia, nisi veniam, vel, dolore dolor quia deserunt ipsa consequuntur!
    </p>
    
    <div style="margin-left: 5%;">
        Ir a <a href="{{ config('app.name') }}/home">Mis Pedidos</a>
    </div>
    <br>
    <br>
</body>

<footer class="container" style="background-color: #222; color:#FFFFFF;">
    <center>
        <div style="width: 90%; padding:20px;">
                 <small>mercadofes.com</small>
             <br>
             <small>Hecho en México, 2022.</small>
         </div>
         <br><br>
         </center>
</footer>
</html>
