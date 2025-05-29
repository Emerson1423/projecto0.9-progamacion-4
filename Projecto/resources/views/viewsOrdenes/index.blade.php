 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <div class="container">
    <h1>Listado de Órdenes</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('ordenes.create') }}" class="btn btn-primary mb-3">Crear Nueva Orden</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordenes as $orden)
            <tr>
                <td>{{ $orden->orden_Id }}</td>
                <td>{{ $orden->usuario->nombre ?? 'N/A' }}</td>
                <td>${{ number_format($orden->total, 2) }}</td>
                <td>
                    
                    <a href="{{ route('ordenes.edit', $orden->orden_Id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('ordenes.destroy', $orden->orden_Id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta orden?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>