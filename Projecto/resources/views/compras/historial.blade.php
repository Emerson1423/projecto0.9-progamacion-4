<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Contrataciones — SECURE CODE S.A.S. de C.V.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --bg: #0d1120;
            --bg-1: #121626;
            --bg-2: #161c33;
            --bg-3: #1b2240;
            --primary: #0047AB;
            --accent: #00E5FF;
            --interact: #3377FF;
            --muted: #E2E8F0;
            --border: #2b3350;
            --border-soft: #475669;
            --white: #FFFFFF;
            --font-display: 'Space Grotesk', sans-serif;
            --font-body: 'Inter', sans-serif;
            --font-mono: 'JetBrains Mono', monospace;
        }

        body {
            background: var(--bg);
            color: var(--white);
            font-family: var(--font-body);
        }

        .text-muted, p.text-muted, span.text-muted, div.text-muted, small.text-muted {
            color: #E2E8F0 !important;
            opacity: 1 !important;
            font-weight: 500 !important;
        }

        p {
            color: #F1F5F9 !important;
            font-size: 15px;
            line-height: 1.6;
        }

        .navbar {
            background: rgba(13, 17, 32, 0.95) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .brand-logo { width: 34px; height: 34px; }
        .brand-name { font-family: var(--font-mono); font-size: 15px; letter-spacing: 0.02em; color: var(--white); font-weight: 700; }
        .brand-name b { color: var(--accent); }

        .eyebrow {
            font-family: var(--font-mono);
            text-transform: uppercase;
            letter-spacing: 0.14em;
            font-size: 12.5px;
            color: var(--accent);
            font-weight: 700;
        }

        .card-custom {
            background: var(--bg-1);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 24px;
        }
        .card-header-custom {
            background: var(--bg-2);
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
        }
        .btn-ghost {
            border: 1px solid var(--border-soft);
            color: var(--white);
            background: transparent;
        }
        .btn-ghost:hover {
            border-color: var(--accent);
            color: var(--accent);
        }
    </style>
</head>
<body>

<header class="navbar navbar-expand-lg px-4 border-bottom border-secondary sticky-top" style="background: rgba(11, 15, 25, 0.94); backdrop-filter: blur(14px); z-index:1000;">
  <div class="container-fluid max-w-1280">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('inicio') }}">
      <svg class="brand-logo" viewBox="0 0 100 100" fill="none" style="width:36px;height:36px;">
        <path d="M50 8L15 24V50C15 70 30 87 50 94C70 87 85 70 85 50V24L50 8Z" stroke="#00E5FF" stroke-width="6" fill="#121626"/>
        <rect x="42" y="66" width="16" height="14" rx="3" fill="#00E5FF"/>
      </svg>
      <span class="brand-name font-monospace fs-5 fw-bold text-light">SECURE<b style="color:var(--accent);">CODE</b></span>
    </a>

    <div class="ms-auto d-flex align-items-center gap-3 flex-wrap">
      <a href="{{ route('inicio') }}" class="btn btn-sm btn-outline-info font-monospace fw-bold">
        <i class="bi bi-house me-1"></i> Inicio / Portal
      </a>
      <a class="btn btn-sm btn-outline-light font-monospace fw-bold" href="{{ route('compras.create') }}">Cotizar Servicios</a>
      <span class="text-light small font-monospace fw-bold fs-6 border-start border-secondary ps-3 ms-1">
        <i class="bi bi-person-circle text-info me-1"></i> {{ auth()->user()->nombre }}
      </span>
      <button class="btn btn-sm btn-outline-danger font-monospace fw-bold" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal">Cerrar Sesión</button>
    </div>
  </div>
</header>

<!-- Modal Confirmar Logout -->
<div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-light border-secondary">
      <div class="modal-header border-secondary">
        <h5 class="modal-title font-monospace fw-bold">Confirmar Cierre de Sesión</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" style="color:#F1F5F9;">
        ¿Deseas cerrar sesión en SECURE CODE S.A.S. de C.V.?
      </div>
      <div class="modal-footer border-secondary">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="button" class="btn btn-secondary btn-sm font-monospace" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger btn-sm font-monospace">Cerrar Sesión</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container py-5" style="max-width: 900px;">
    <div class="mb-4">
        <span class="eyebrow">Historial de Clientes</span>
        <h2 class="text-light fw-bold">Mis Contrataciones & Cartas de Autorización</h2>
        <p style="color:#E2E8F0 !important; font-size:16px;" class="fw-medium">Consulta el estado de tus órdenes de auditoría y descarga tus comprobantes en formato PDF.</p>
    </div>

    @if(isset($mensaje))
        <div class="alert alert-info bg-dark text-info border-info font-monospace">{{ $mensaje }}</div>
    @elseif($ordenes->isEmpty())
        <div class="alert alert-info bg-dark text-info border-info font-monospace">Aún no has realizado ninguna contratación de servicios de ciberseguridad.</div>
    @else
        @foreach($ordenes as $orden)
            <div class="card-custom">
                <div class="card-header-custom d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <span class="font-monospace small fw-bold" style="color:#00E5FF !important;">Orden #{{ $orden->orden_Id }}</span>
                        <span class="text-light small ms-2 fw-medium">· Contratado el: {{ $orden->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="text-info font-monospace fw-bold fs-5">${{ number_format($orden->total, 2) }} USD</span>
                        <a href="{{ route('compras.descargar', $orden->orden_Id) }}" class="btn btn-sm btn-outline-info font-monospace fw-bold">
                            <i class="bi bi-file-earmark-pdf-fill me-1"></i> Descargar Carta/Factura PDF
                        </a>
                    </div>
                </div>
                <div class="p-3">
                    @foreach($orden->pedidos as $pedido)
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-secondary">
                            <div>
                                <h6 class="text-light mb-1 fw-bold fs-6">{{ $pedido->juego->titulo }}</h6>
                                <span class="small" style="color:#CBD5E1 !important;">Cantidad: {{ $pedido->cantidad }} · Tarifa Unit.: ${{ number_format($pedido->precio_unitario, 2) }}</span>
                            </div>
                            <span class="text-light font-monospace fw-bold fs-6">${{ number_format($pedido->precio_unitario * $pedido->cantidad, 2) }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="px-3 py-2 bg-dark font-monospace small d-flex justify-content-between fw-bold" style="color:#E2E8F0 !important;">
                    <span>Estado: Monitoreo / Auditoría Activa</span>
                    <span>Pago registrado vía tarjeta de crédito/débito</span>
                </div>
            </div>
        @endforeach
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>