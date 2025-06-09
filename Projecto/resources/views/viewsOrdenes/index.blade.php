 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>Ordenes</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
@extends('administracion.admin')
@section('content')
   
   <div class="container">
    <h1>Listado de Órdenes</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif



    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Total</th>
                <!--<th>Acciones</th>-->
            </tr>
        </thead>
        <tbody>
            @foreach($ordenes as $orden)
            <tr>
                <td>{{ $orden->orden_Id }}</td>
                <td>{{ $orden->usuario->nombre ?? 'N/A' }}</td>
                <td>${{ number_format($orden->total, 2) }}</td>
                <!--<td>
                    
                    <a href="{{ route('ordenes.edit', $orden->orden_Id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('ordenes.destroy', $orden->orden_Id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta orden?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>-->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
</body>
</html>