<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <div class="container">
    <h1>Listado de Pagos</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pagos.create') }}" class="btn btn-primary mb-3">Registrar Nuevo Pago</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Orden ID</th>
                <th>Monto</th>
                <th>Últimos 4 dígitos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pagos as $pago)
            <tr>
                <td>{{ $pago->pago_Id }}</td>
                <td>{{ $pago->orden_Id }}</td>
                <td>${{ number_format($pago->monto, 2) }}</td>
                <td>{{ $pago->tarjeta_ultimos }}</td>
                <td>
                    <a href="{{ route('pagos.edit', $pago->pago_Id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('pagos.destroy', $pago->pago_Id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este pago?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>