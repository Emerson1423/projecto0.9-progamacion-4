<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos</title>
</head>
<style>
    body {
        font-family: Poppins, sans-serif;
        background-color: #f0f0f0;
        color: #333;
        margin: 0;
        padding: 20px;
        
    }
    table {
        font-family: Poppins, sans-serif;
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 800px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        border-radius: 10px;
        overflow: hidden;
        background-color:rgb(241, 241, 242);
    }
    thead tr {
        background-color: #0f3460;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }
    th, td {
        padding: 15px 20px;
        
    }
    h1{
        text-align: center;
    }
    button {
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: all 0.3s ease;
        margin: 2px;
    }
    a button {
        background-color: #4CAF50;
        color: white;
    }
    form {
        display: inline-block;
    }
    form button {
        background-color: #f44336;
        color: white;
    }

    </style>
<body>
@extends('administracion.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Listado de Juegos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('juegos.crear') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus me-1"></i> Nuevo Juego
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Plataforma</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videogames as $juego)
            <tr>
                <td>{{ $juego->juegos_Id }}</td>
                <td>
                    @if($juego->imagen)
                        <img src="{{ asset('storage/' . $juego->imagen) }}" alt="{{ $juego->titulo }}" width="50">
                    @else
                        <span class="text-muted">Sin imagen</span>
                    @endif
                </td>
                <td>{{ $juego->titulo }}</td>
                <td>${{ number_format($juego->precio, 2) }}</td>
                <td>{{ $juego->cantidad_dispo }}</td>
                <td>{{ $juego->plataforma->nombrePlataforma }}</td>
                <td>{{ $juego->categoria->nombre }}</td>
                <td>
                    <a href="{{ route('juegos.editar', $juego->juegos_Id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('juegos.eliminar', $juego->juegos_Id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

    
</body>
</html>