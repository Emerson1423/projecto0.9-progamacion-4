<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .sidebar {
            height: 100vh;
            background: #343a40;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.75);
        }
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }
        .sidebar .nav-link:hover {
            color: white;
        }

        /* Para animar la flecha */
            .collapsed .fa-chevron-down {
                transform: rotate(0deg);
                transition: transform 0.3s ease;
            }

            .fa-chevron-down {
                transform: rotate(180deg);
                transition: transform 0.3s ease;
            }

            /* Para mejor espaciado */
            .nav-link {
                position: relative;
            }

            .nav-link .float-end {
                position: absolute;
                right: 1rem;
            }
    </style>
</head>
<body>
    <div class="container-fluid">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="ms-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-black" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->nombre }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal">Cerrar sesión</button></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar bg-dark">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <!-- Enlace principal con atributos para desplegar -->
                            <a class="nav-link {{ request()->is('juego/juegos*') ? 'active' : '' }}" 
                            data-bs-toggle="collapse" 
                            href="#juegosSubmenu"
                            aria-expanded="{{ request()->is('juego/juegos*') ? 'true' : 'false' }}">
                                <i class="fas fa-gamepad me-2"></i> Juegos
                                <i class="fas fa-chevron-down float-end mt-1"></i> <!-- Icono flecha -->
                            </a>
                            
                            <!-- Submenú desplegable -->
                            <ul class="nav flex-column ms-3 collapse {{ request()->is('juego/juegos*') ? 'show' : '' }}" 
                                id="juegosSubmenu">

                                <li class="nav-item"> 
                                    <a class="nav-link {{ request()->is('juego/juegos*') ? 'active' : '' }}" 
                                    href="{{ route('juegos.index') }}">
                                      <i class="fas fa-gamepad me-2"></i> Lista de juegos
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('juego/juegos/crear') ? 'active' : '' }}" 
                                    href="{{ route('juegos.crear') }}">
                                        <i class="fas fa-plus-circle me-1"></i> Crear
                                    </a>
                                </li>
                              
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('categorias/categoria*') ? 'active' : '' }}" 
                               href="{{ route('caindex') }}">
                               <i class="fa-solid fa-icons"></i> Categorias
                            </a>
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('categorias/categoria/crear') ? 'active' : '' }}" 
                                       href="{{ route('caCrear') }}">
                                        <i class="fas fa-plus-circle me-1"></i> Crear
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('plataforma/plataformas*') ? 'active' : '' }}" 
                               href="{{ route('plaindex') }}">
                               <i class="fas fa-tv"></i> Plataforma
                            </a>
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('plataforma/plataformas/crear') ? 'active' : '' }}" 
                                       href="{{ route('plaCrear') }}">
                                        <i class="fas fa-plus-circle me-1"></i> Crear
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('proveedores/proveedor*') ? 'active' : '' }}" 
                               href="{{ route('proindex') }}">
                               <i class="fa-solid fa-truck"></i> Proveedores
                            </a>
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('proveedores/proveedor/crear') ? 'active' : '' }}" 
                                       href="{{ route('proCrear') }}">
                                        <i class="fas fa-plus-circle me-1"></i> Crear
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('orden/ordenes*') ? 'active' : '' }}" 
                               href="{{ route('ordenes.index') }}">
                               <i class="fa-solid fa-cash-register"></i> Ventas
                            </a>
                           
                        </li>                        
                    </ul>
                </div>
            </div>
            

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>
 <!-- modal de confirmación para cerrar sesión -->
    <div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-labelledby="confirmLogoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmLogoutModalLabel">Confirmar cierre de sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas cerrar sesión?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>