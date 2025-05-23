<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1>Editar Rol</h1>

    <form action="{{ route('roles.update', $role->rol_Id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombrerol">Nombre del Rol:</label>
            <input type="text" class="form-control @error('nombrerol') is-invalid @enderror" id="nombrerol" name="nombrerol" value="{{ old('nombrerol', $role->nombrerol) }}" required>
            @error('nombrerol')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>