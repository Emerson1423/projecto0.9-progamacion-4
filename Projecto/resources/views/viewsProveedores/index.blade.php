<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
</head>

<style>
    body {
        font-family: Poppins, sans-serif;
        background-color: #f0f0f0;
        color: #333;
        margin: 0;
        padding: 20px;
        
    }
    
    </style>


<body>

@extends('administracion.admin')
@section('content')

    <h1>Lista de Proveedores</h1>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach($proveedores as $proveedor)
            <tr>
                <td>{{ $proveedor->proveedor_Id }}</td>
                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->direcciom }}</td>
                <td>{{ $proveedor->telefono }}</td>
                <td>{{ $proveedor->correo }}</td>
                
                <td>
                    <a href="{{ route('proEditar', $proveedor->proveedor_Id) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('proEliminar', $proveedor->proveedor_Id) }}" method="POST" class="d-inline"  >
                    @csrf
                    @method('DELETE')
            
                    <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
</body>
</html>