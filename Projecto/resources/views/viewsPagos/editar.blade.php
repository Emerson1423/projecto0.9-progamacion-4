<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Editar Pago</h1>

    <form action="{{ route('pagos.update', $pago->pago_Id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="orden_Id">Orden:</label>
            <select class="form-control @error('orden_Id') is-invalid @enderror" id="orden_Id" name="orden_Id" required>
                <option value="">Seleccione una orden</option>
                @foreach($ordenes as $orden)
                    <option value="{{ $orden->orden_Id }}" {{ $pago->orden_Id == $orden->orden_Id ? 'selected' : '' }}>
                        Orden #{{ $orden->orden_Id }} - ${{ number_format($orden->total, 2) }}
                    </option>
                @endforeach
            </select>
            @error('orden_Id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="monto">Monto:</label>
            <input type="number" step="0.01" class="form-control @error('monto') is-invalid @enderror" id="monto" name="monto" value="{{ old('monto', $pago->monto) }}" required>
            @error('monto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tarjeta_ultimos">Últimos 4 dígitos de tarjeta:</label>
            <input type="text" class="form-control @error('tarjeta_ultimos') is-invalid @enderror" id="tarjeta_ultimos" name="tarjeta_ultimos" value="{{ old('tarjeta_ultimos', $pago->tarjeta_ultimos) }}" required maxlength="4" pattern="\d{4}">
            @error('tarjeta_ultimos')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>