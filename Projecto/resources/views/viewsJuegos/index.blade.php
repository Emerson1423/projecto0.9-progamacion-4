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

    h1{
        text-align: center;
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
                    @if($juego->imagen_url)
                        <img src="{{  $juego->imagen_url }}" alt="{{ $juego->titulo }}" width="50">
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