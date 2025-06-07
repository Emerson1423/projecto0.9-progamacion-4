<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
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

<h1>Categorias</h1>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        
    @foreach($categorias as $categoria)
        <tr>
            <td>{{ $categoria->categoria_Id}}</td>
            <td>{{ $categoria->nombre }}</td>
            
            <td>
                <a href="{{ route('caEditar', $categoria->categoria_Id) }}" class="btn btn-sm btn-warning">
               
                <i class="fas fa-edit"></i>
                
                </a>
                <form action="{{ route('caEliminar', $categoria->categoria_Id) }}" method="POST" class="d-inline" >
                @csrf
                @method('DELETE')
        
                <button type="submit" class="btn btn-sm btn-danger">
                <i class="fas fa-trash-alt"></i>
                </button>
            </form>
            </td>

        </tr>
    @endforeach

</table>
@endsection
</body>
</html>