<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>editar usuario</h1>

<form action="{{ route('usuarios.actualizar', $usuario->usuario_Id) }}" method="POST">
    @csrf
    @method('PUT')
    <Label for="nombre">Nombre Usuario</Label>
    <input type="text" name="nombre"  value="{{ $usuario->nombre }}" >
    <Label for="correo">Correo Usuario</Label>
    <input type="text" name="correo"  value="{{ $usuario->email }}" >
    <Label for="contraseña">contraseña</Label>
    <input type="text" name="contraseña"  value="{{ $usuario->password }}" >
    <label for="rol_Id" class="form-label">rol</label>
        <select class="form-select" id="rol_Id" name="rol_Id" required>
            <option value="">Seleccione el proveedor</option>
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
</body>
</html>