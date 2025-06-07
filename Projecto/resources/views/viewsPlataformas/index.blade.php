<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataformas</title>
</head>
<style>
    body {
        font-family: Poppins, sans-serif;
        background-color: #f0f0f0;
        color: #333;
        margin: 0;
        padding: 20px;
        
    }

    h1{
        text-align: center;
    }


</style>
<body>
@extends('administracion.admin')
@section('content')
<h1>Lista de Plataformas</h1>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        
    @foreach($plataformas as $plataforma)
        <tr>
            <td>{{ $plataforma->plataforma_Id }}</td>
            <td>{{ $plataforma->nombrePlataforma }}</td>
            
            <td>
                <a href="{{ route('plaEditar', $plataforma->plataforma_Id) }}"class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i>
               
                </a>
                <form action="{{ route('plaEliminar', $plataforma->plataforma_Id) }}" method="POST" class="d-inline" >
                @csrf
                @method('DELETE')
        
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">
                <i class="fas fa-trash-alt"></i>
                </button>
            </form>
            </td>

        </tr>
    @endforeach

    @endsection
</body>
</html>