<!-- resources/views/facturas/pdf.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Factura ViceGames</title>
    
</head>
<body>
<!-- facturas/pdf.blade.php -->
<h1>Factura Orden #{{ $orden->orden_Id }}</h1>
<p>Cliente: {{ $orden->usuario->nombre }}</p>
<p>Total: ${{ number_format($orden->total, 2) }}</p>

<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Juego</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orden->pedidos as $pedido)
        <tr>
            <td>{{ $pedido->juego->titulo }}</td> <!-- O como se llame el campo del juego -->
            <td>{{ $pedido->cantidad }}</td>
            <td>${{ number_format($pedido->precio_unitario, 2) }}</td>
            <td>${{ number_format($pedido->cantidad * $pedido->precio_unitario, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
