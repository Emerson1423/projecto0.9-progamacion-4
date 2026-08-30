<!DOCTYPE html>
<html lang="es-SV">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Catálogo de Servicios de Ciberseguridad — SECURE CODE S.A.S. de C.V.</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

  .card-service {
    background: var(--bg-1);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 24px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: border-color .2s, transform .2s;
  }
  .card-service:hover {
    border-color: var(--accent);
    transform: translateY(-4px);
  }

  .btn-primary-custom {
    background: linear-gradient(135deg, var(--interact), var(--primary));
    color: var(--white);
    font-family: var(--font-mono);
    font-size: 13px;
    font-weight: 700;
    border: none;
    padding: 10px 18px;
    border-radius: 6px;
    text-align: center;
    text-decoration: none;
  }
  .btn-primary-custom:hover {
    color: var(--white);
    box-shadow: 0 4px 16px rgba(0,71,171,0.4);
  }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg px-4">
  <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('inicio') }}">
    <svg class="brand-logo" viewBox="0 0 100 100" fill="none">
      <path d="M50 8L15 24V50C15 70 30 87 50 94C70 87 85 70 85 50V24L50 8Z" stroke="#00E5FF" stroke-width="6" fill="#121626"/>
      <rect x="42" y="66" width="16" height="14" rx="3" fill="#00E5FF"/>
    </svg>
    <span class="brand-name">SECURE<b>CODE</b> S.A.S. de C.V.</span>
  </a>

  <div class="ms-auto d-flex align-items-center gap-3">
    <a href="{{ route('inicio') }}" class="btn btn-sm btn-outline-light font-monospace fw-bold">Inicio</a>
    @auth
      <a href="{{ route('compras.create') }}" class="btn btn-sm btn-primary-custom">Cotizar Servicios</a>
    @else
      <a href="{{ route('login') }}" class="btn btn-sm btn-outline-info font-monospace fw-bold">Iniciar Sesión</a>
    @endauth
  </div>
</nav>

<div class="container py-5">
    <div class="text-center mb-5">
        <span class="eyebrow">Catálogo Oficial de Servicios</span>
        <h1 class="text-light display-5 fw-bold" style="font-family:var(--font-display);">Servicios de Ciberseguridad</h1>
        <p style="color:#E2E8F0 !important; font-size:16px;" class="max-w-2xl mx-auto fw-medium">Soluciones especializadas en ingeniería de software seguro, auditoría técnica y bastionado registradas en El Salvador.</p>
    </div>

    <div class="row g-4">
        @foreach($videogames as $juego)
        <div class="col-md-4">
            <div class="card-service">
                <div>
                    <span class="badge bg-dark text-info border border-info font-monospace mb-2 fw-bold">
                        {{ $juego->categoria->nombre ?? 'Auditoría Especializada' }}
                    </span>
                    <h4 class="text-light fw-bold mb-2 fs-5">{{ $juego->titulo }}</h4>
                    <p class="small mb-3" style="color:#E2E8F0 !important;">{{ $juego->descripcion }}</p>
                </div>

                <div class="pt-3 border-top border-secondary d-flex justify-content-between align-items-center">
                    <div>
                        <span class="small d-block fw-bold" style="color:#CBD5E1 !important;">Precio Base</span>
                        <span class="text-info font-monospace fw-bold fs-5">${{ number_format($juego->precio, 2) }}</span>
                    </div>
                    <a href="{{ route('compras.create') }}" class="btn-primary-custom">Cotizar / Armar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<footer class="py-4 border-top border-secondary text-center small">
    <p class="m-0" style="color:#CBD5E1 !important;">© 2026 SECURE CODE S.A.S. de C.V. Todos los derechos reservados. San Miguel, El Salvador.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>