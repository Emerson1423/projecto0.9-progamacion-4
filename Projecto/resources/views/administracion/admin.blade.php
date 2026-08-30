<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo — SECURE CODE S.A.S. de C.V.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            margin: 0;
            padding: 0;
        }

        /* MÁXIMO CONTRASTE GLOBAL EN EL PANEL ADMINISTRATIVO */
        .text-muted, p.text-muted, span.text-muted, div.text-muted, small.text-muted {
            color: #E2E8F0 !important;
            opacity: 1 !important;
            font-weight: 500 !important;
        }

        p {
            color: #F1F5F9 !important;
        }

        h1, h2, h3, h4, h5, h6 {
            color: #FFFFFF !important;
            font-weight: 700;
        }

        table {
            color: #FFFFFF !important;
        }
        .table {
            --bs-table-color: #FFFFFF !important;
            --bs-table-hover-color: #00E5FF !important;
        }

        .sidebar {
            min-height: 100vh;
            background: var(--bg-1);
            border-right: 1px solid var(--border);
        }
        .sidebar .nav-link {
            color: #E2E8F0;
            font-size: 14px;
            font-weight: 600;
            padding: 10px 14px;
            border-radius: 6px;
            margin-bottom: 4px;
            transition: all .15s;
        }
        .sidebar .nav-link.active {
            color: var(--accent);
            background: rgba(0, 229, 255, 0.08);
            border: 1px solid rgba(0, 229, 255, 0.3);
        }
        .sidebar .nav-link:hover {
            color: var(--white);
            background: var(--bg-2);
        }

        .brand-logo { width: 30px; height: 30px; }
        .brand-name { font-family: var(--font-mono); font-size: 14px; color: var(--white); font-weight: 700; }
        .brand-name b { color: var(--accent); }

        .navbar-admin {
            background: var(--bg-1) !important;
            border-bottom: 1px solid var(--border);
        }

        main {
            background: var(--bg);
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-admin px-4">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('inicio') }}">
                <svg class="brand-logo" viewBox="0 0 100 100" fill="none">
                  <path d="M50 8L15 24V50C15 70 30 87 50 94C70 87 85 70 85 50V24L50 8Z" stroke="#00E5FF" stroke-width="6" fill="#121626"/>
                  <rect x="42" y="66" width="16" height="14" rx="3" fill="#00E5FF"/>
                </svg>
                <span class="brand-name">SECURE<b>CODE</b> · Panel Admin</span>
            </a>

            <div class="ms-auto d-flex align-items-center gap-3">
                <a class="btn btn-sm btn-outline-info font-monospace fw-bold" href="{{ route('inicio') }}">Ver Portal Público</a>
                <span class="text-light small font-monospace fw-bold fs-6">
                    <i class="bi bi-person-circle text-info me-1"></i> {{ auth()->user()->nombre }}
                </span>
                <button class="btn btn-sm btn-outline-danger font-monospace fw-bold" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal">Salir</button>
            </div>
        </nav>

        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar px-3 py-4">
                <div class="mb-3 px-2">
                    <span class="font-monospace uppercase small fw-bold" style="color:var(--accent);">Gestión Corporativa</span>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('juego/juegos*') ? 'active' : '' }}" href="{{ route('juegos.index') }}">
                            <i class="fas fa-shield-alt me-2 text-info"></i> Servicios de Ciberseguridad
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('categorias/categoria*') ? 'active' : '' }}" href="{{ route('caindex') }}">
                            <i class="fas fa-tags me-2 text-info"></i> Categorías de Auditoría
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('plataforma/plataformas*') ? 'active' : '' }}" href="{{ route('plaindex') }}">
                            <i class="fas fa-network-wired me-2 text-info"></i> Plataformas Evaluadas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('proveedores/proveedor*') ? 'active' : '' }}" href="{{ route('proindex') }}">
                            <i class="fas fa-building me-2 text-info"></i> Sedes Corporativas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('orden/ordenes*') ? 'active' : '' }}" href="{{ route('ordenes.index') }}">
                            <i class="fas fa-file-invoice-dollar me-2 text-info"></i> Contrataciones & Órdenes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('usuario/usuarios*') ? 'active' : '' }}" href="{{ route('usuarios.index') }}">
                            <i class="fas fa-users me-2 text-info"></i> Usuarios & Roles
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 p-4">
                @if(request()->is('admin'))
                    <div class="mb-4">
                        <h2 class="text-light fw-bold">Bienvenido al Panel Administrativo</h2>
                        <p style="color:#E2E8F0 !important;" class="fw-medium">Administración centralizada de servicios, contratos y usuarios de SECURE CODE S.A.S. de C.V.</p>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="p-3 bg-dark rounded border border-secondary">
                                <span class="font-monospace small fw-bold" style="color:var(--accent);">Organización</span>
                                <h4 class="text-light mt-1 mb-0 fw-bold">SECURE CODE S.A.S. de C.V.</h4>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-dark rounded border border-secondary">
                                <span class="font-monospace small fw-bold" style="color:var(--accent);">Representante Legal</span>
                                <h4 class="text-info mt-1 mb-0 fw-bold">{{ auth()->user()->nombre ?? 'CARLOS GÓMEZ' }}</h4>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-dark rounded border border-secondary">
                                <span class="font-monospace small fw-bold" style="color:var(--accent);">Oficina Principal</span>
                                <h4 class="text-light mt-1 mb-0 fw-bold">San Miguel Centro</h4>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-light border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title font-monospace fw-bold">Confirmar Cierre de Sesión</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="color:#F1F5F9;">
                    ¿Estás seguro de que deseas salir del Panel Administrativo de SECURE CODE?
                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary btn-sm font-monospace" data-bs-dismiss="modal">Cancelar</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm font-monospace">Cerrar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>