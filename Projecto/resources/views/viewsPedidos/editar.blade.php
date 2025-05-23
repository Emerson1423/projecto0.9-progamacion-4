<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Editar Pedido</h1>

    <form action="{{ route('pedidos.update', $pedido->pedido_Id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="orden_Id">Orden:</label>
            <select class="form-control @error('orden_Id') is-invalid @enderror" id="orden_Id" name="orden_Id" required>
                <option value="">Seleccione una orden</option>
                @foreach($ordenes as $orden)
                    <option value="{{ $orden->orden_Id }}" {{ $pedido->orden_Id == $orden->orden_Id ? 'selected' : '' }}>
                        Orden #{{ $orden->orden_Id }}
                    </option>
                @endforeach
            </select>
            @error('orden_Id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="juegos_Id">Juego:</label>
            <select class="form-control @error('juegos_Id') is-invalid @enderror" id="juegos_Id" name="juegos_Id" required>
                <option value="">Seleccione un juego</option>
                @foreach($juegos as $juego)
                    <option value="{{ $juego->juegos_Id }}" data-precio="{{ $juego->precio }}" {{ $pedido->juegos_Id == $juego->juegos_Id ? 'selected' : '' }}>
                        {{ $juego->titulo }} - ${{ number_format($juego->precio, 2) }}
                    </option>
                @endforeach
            </select>
            @error('juegos_Id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" class="form-control @error('cantidad') is-invalid @enderror" id="cantidad" name="cantidad" value="{{ old('cantidad', $pedido->cantidad) }}" min="1" required>
            @error('cantidad')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="precio_unitario">Precio Unitario:</label>
            <input type="number" step="0.01" class="form-control @error('precio_unitario') is-invalid @enderror" id="precio_unitario" name="precio_unitario" value="{{ old('precio_unitario', $pedido->precio_unitario) }}" min="0" required>
            @error('precio_unitario')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    <script>
        // Auto-completar precio unitario al seleccionar juego
        document.getElementById('juegos_Id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const precio = selectedOption.getAttribute('data-precio');
            if (precio) {
                document.getElementById('precio_unitario').value = precio;
            }
        });
    </script>
</div>
</body>
</html>