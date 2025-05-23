<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@extends('administracion.admin')
@section('content')
<h1>Ingresar usuario</h1>


<form action="{{ route('usuarios.guardar') }}" method="post">
    @csrf
    <label for="">Nombre</label>
    <input type="text" name="nombre" placeholder="name">
    <label for="">email</label>
    <input type="text" name="email" placeholder="email">
    <label for="">contraseña</label>
    <input type="password" name="password" placeholder="password">
    <label for="rol_Id" class="form-label">rol</label>
        <select class="form-select" name="rol_Id" required>
            <option value="">Seleccione rol</option>
                @foreach ($roles as $rol)
                <option value="{{ $rol->rol_Id }}" {{ old('rol_Id') == $rol->rol_Id ? 'selected' : '' }}>
                {{ $rol->nombrerol }}
            </option>
                @endforeach
        </select>

    <button type="submit">
    <i class="fas fa-save me-1"></i> Guardar
    </button>

</form>  

@endsection
    
</body>
</html>