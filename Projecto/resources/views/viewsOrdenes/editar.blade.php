<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Editar Orden</h1>

    <form action="{{ route('ordenes.update', $orden->orden_Id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="usuario_Id">Usuario:</label>
            <select class="form-control @error('usuario_Id') is-invalid @enderror" id="usuario_Id" name="usuario_Id" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->usuario_Id }}" {{ $orden->usuario_Id == $usuario->usuario_Id ? 'selected' : '' }}>
                        {{ $usuario->nombre }}
                    </option>
                @endforeach
            </select>
            @error('usuario_Id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="total">Total:</label>
            <input type="number" step="0.01" class="form-control @error('total') is-invalid @enderror" id="total" name="total" value="{{ old('total', $orden->total) }}" required>
            @error('total')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('ordenes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>