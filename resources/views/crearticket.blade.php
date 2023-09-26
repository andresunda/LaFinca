<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
    <style>
        .ticket {}

        .ticket img {
            padding-left: 15%;
            padding-bottom: 0%;
            width: 170px;
            height: 80px;
        }
    </style>
</head>

<body>
    <div class="ticket"><img src="images/FincaCorto.png"></div>
    <br>
    <div style="text-align: center;">
        <div><strong>Libertad #65, Tesistan.</strong></div>
        <div><strong>Telefono: </strong>33 3685 6049</div>
        <div><strong>Fecha:</strong> {{ $tickets->created_at }}</div>
        <div><strong>Mesero:</strong> {{ $tickets->usuario->nombre }}</div>
        <div><strong>Cliente:</strong> {{ $tickets->cliente->nombre }} {{ $tickets->cliente->apellido_paterno }}</div>
        <div><strong>Folio:<strong> {{ $tickets->id }}</div>
        <div><strong>Tipo de consumo:</strong> {{ $tickets->consumo->tipo_consumo }}</div>
        <br>
        <table style="margin: 0 auto;">
            <tbody>
                <tr>
                    <th>Cant </th>
                    <th>Especi</th>
                    <th>Tam</th>
                    <th>P.Unitario</th>
                </tr>
                @foreach ($articulos as $articulo)
                <tr style="text-align: center;">
                    <td>{{ $articulo->cantidad }}</td>
                    <td>{{ $articulo->producto->nombre_producto }}</td>
                    <td>
                        @if($articulo->producto->categoria->categoria_producto == "pepitos")
                        .
                        @elseif($articulo->producto->categoria->categoria_producto == "otros")
                        .
                        @else
                            {{$articulo->tamano}}
                        @endif
                    </td>
                    <td>
                        @if($articulo->tamano === 'chica')
                            ${{ $articulo->producto->precio->precio_chica }}
                        @else
                            ${{ $articulo->producto->precio->precio_grande }}
                        @endif
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4" ><strong>Nota: {{$articulo->pedido->nota->nota_pedido}}</strong></td>
                </tr>

                <br>
                <tr>
                    <td colspan="4" style="text-align:right; padding-right:25px;"><strong>Total:</strong> ${{$articulo->pedido->total_pedido}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <div><strong>¡Gracias por su compra!</strong></div>
    </div>
</body>
</html>
