<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>historial-compras</title>
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<style>
    body {
        background: #f8fafc;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 700px;
        margin: 40px auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        padding: 30px 40px;
    }
    h2 {
        color: #2d3748;
        margin-bottom: 30px;
        text-align: center;
        letter-spacing: 1px;
    }
    .alert {
        padding: 12px 18px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 1rem;
    }
    .alert-success {
        background: #e6fffa;
        color: #2c7a7b;
        border: 1px solid #b2f5ea;
    }
    .alert-info {
        background: #ebf8ff;
        color: #3182ce;
        border: 1px solid #bee3f8;
    }
    .card {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        margin-bottom: 24px;
        background: #f9fafb;
        box-shadow: 0 2px 8px rgba(0,0,0,0.03);
    }
    .card-header {
        background: #edf2f7;
        padding: 14px 20px;
        font-weight: 600;
        font-size: 1.1rem;
        border-bottom: 1px solid #e2e8f0;
        color: #2b6cb0;
    }
    .card-body {
        padding: 18px 20px;
    }
    .list-group {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .list-group-item {
        background: transparent;
        border: none;
        border-bottom: 1px solid #e2e8f0;
        padding: 10px 0;
        font-size: 1rem;
        color: #4a5568;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .list-group-item:last-child {
        border-bottom: none;
    }
    .card-footer {
        background: #f1f5f9;
        padding: 10px 20px;
        font-size: 0.95rem;
        color: #718096;
        border-top: 1px solid #e2e8f0;
        border-radius: 0 0 8px 8px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
  <a class="navbar-brand" href="{{ route('compras.create') }}">Mi Tienda</a>

  <div class="ms-auto">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('compras.create') }}">Inicio</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ auth()->user()->nombre }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
          <li>
            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal">
              Cerrar sesión
            </button>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<!-- Modal de confirmación para cerrar sesión -->
<div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutLabel">¿Deseas cerrar sesión?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        Tu sesión se cerrará y deberás iniciar sesión nuevamente para acceder a tu cuenta.
      </div>
      <div class="modal-footer">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container mt-4">
    <h2>Mis Compras</h2>

    @if(isset($mensaje))
        <div class="alert alert-info">{{ $mensaje }}</div>
    @elseif($ordenes->isEmpty())
        <div class="alert alert-info">Aún no has realizado ninguna compra.</div>
    @else
        @foreach($ordenes as $orden)
            <div class="card mb-4 shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                    <span><strong>Compra realizada el:</strong> {{ $orden->created_at->format('d/m/Y H:i') }}</span>
                    <span><strong>Total:</strong> ${{ number_format($orden->total, 2) }}</span>
                </div>
                <div class="card-body">
                    @foreach($orden->pedidos as $pedido)
                        <div class="row align-items-center mb-3 border-bottom pb-2">
                            <div class="col-md-2">
                                <img src="{{ asset('storage/' . $pedido->juego->imagen) }}" alt="{{ $pedido->juego->titulo }}" class="img-fluid rounded" style="max-height: 80px;">
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-1">{{ $pedido->juego->titulo }}</h6>
                                <small>Cantidad: {{ $pedido->cantidad }}</small>
                            </div>
                            <div class="col-md-4 text-end">
                                <strong>${{ number_format($pedido->precio_unitario * $pedido->cantidad, 2) }}</strong>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer text-muted text-end">
                    Pago con tarjeta 
                </div>
            </div>
        @endforeach
    @endif
</div>
    
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>