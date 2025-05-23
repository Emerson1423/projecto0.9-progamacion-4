<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Listado de Pedidos</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pedidos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Pedido</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Orden</th>
                <th>Juego</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->pedido_Id }}</td>
                <td>Orden #{{ $pedido->orden_Id }}</td>
                <td>{{ $pedido->juego->titulo ?? 'N/A' }}</td>
                <td>{{ $pedido->cantidad }}</td>
                <td>${{ number_format($pedido->precio_unitario, 2) }}</td>
                <td>${{ number_format($pedido->cantidad * $pedido->precio_unitario, 2) }}</td>
                <td>
                    <a href="{{ route('pedidos.edit', $pedido->pedido_Id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('pedidos.destroy', $pedido->pedido_Id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este pedido?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>