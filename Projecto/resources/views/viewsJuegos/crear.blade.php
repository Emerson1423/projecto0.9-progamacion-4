<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Juegos</title>
</head>
<style>
    body {
        font-family: poppins, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: auto;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    
    button {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        background-color: #218838;
    }

    .error {
        color: red;
        margin-bottom: 15px;
    }
</style>

<body>

@extends('administracion.admin')
<!-- Mostrar errores de validación -->
@if($errors->any())
    <div class="error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Crear Nuevo Juego</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('juegos.guardar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="titulo" class="form-label">Nombre del Juego</label>
                    <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" step="0.01" min="0" class="form-control" name="precio" value="{{ old('precio') }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" rows="3" required>{{ old('descripcion') }}</textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="cantidad_dispo" class="form-label">Cantidad Disponible</label>
                    <input type="number" min="0" class="form-control" name="cantidad_dispo" value="{{ old('cantidad_dispo') }}" required>
                </div>
                <div class="col-md-4">
                    <label for="plataforma_Id" class="form-label">Plataforma</label>
                    <select class="form-select" name="plataforma_Id" required>
                        <option value="">Seleccione la plataforma</option>
                        @foreach ($plataformas as $plataforma)
                            <option value="{{ $plataforma->plataforma_Id }}" {{ old('plataforma_Id') == $plataforma->plataforma_Id ? 'selected' : '' }}>
                                {{ $plataforma->nombrePlataforma }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="categoria_Id" class="form-label">Categoría</label>
                    <select class="form-select" name="categoria_Id" required>
                        <option value="">Seleccione la categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->categoria_Id }}" {{ old('categoria_Id') == $categoria->categoria_Id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="proveedor_Id" class="form-label">Proveedor</label>
                    <select class="form-select" name="proveedor_Id" required>
                        <option value="">Seleccione el proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->proveedor_Id }}" {{ old('proveedor_Id') == $proveedor->proveedor_Id ? 'selected' : '' }}>
                                {{ $proveedor->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" name="imagen" accept="image/jpeg,image/png,image/jpg,image/gif" required>
                    <small class="text-muted">Formatos aceptados: jpeg, png, jpg, gif (Máx. 2MB)</small>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('juegos.index') }}" class="btn btn-secondary me-md-2">
                    <i class="fas fa-arrow-left me-1"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Guardar Juego
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
    
</body>
</html>