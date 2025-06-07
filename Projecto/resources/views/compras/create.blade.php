<!DOCTYPE html>
<html>
<head>
<<<<<<< HEAD
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .cart-dropdown {
            position: absolute;
            top: 60px;
            right: 20px;
            width: 320px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            z-index: 1000;
            display: none;
        }

        .cart-dropdown.active {
            display: block;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 8px;
            border-bottom: 1px solid #eee;
        }

        .cart-item img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 10px;
        }

        .cart-summary {
            padding: 10px;
        }

        .cart-icon {
            position: relative;
            cursor: pointer;
        }

        .cart-count {
            position: absolute;
            top: -6px;
            right: -6px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }
    </style>
</head>
<body>

=======
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar</title>
    
    <!-- En el head -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">ViceGames</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-cart-fill"></i> Carrito 
                                <span class="badge bg-danger" id="cart-count">0</span>
                            </a>
                        </li>
                    </ul>
                    
                    @auth
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->nombre }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </nav>

    <div class="container py-5">
        <div class="row">
            <!-- Lista de Productos -->
            <div class="col-md-8">
                <h2 class="mb-4">Nuestros Productos</h2>
                <div class="row">
                @foreach($productos as $producto)
                <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                    <div class="card w-100 product-card">
                        <div class="img-container" style="height: 180px; overflow: hidden; display: flex; justify-content: center; align-items: center; background: #f8f9fa;">
                <img src="{{ $producto->imagen_url ?? 'https://via.placeholder.com/300' }}" 
                     class="product-img" 
                     style="object-fit: contain; width: 100%; height: 100%;"
                     alt="{{ $producto->titulo }}">
            </div>

            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $producto->titulo }}</h5>
                <p class="card-text flex-grow-1">{{ Str::limit($producto->descripcion, 100) }}</p>
                <p class="h5 text-warning">${{ number_format($producto->precio, 2) }}</p>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="input-group" style="width: 120px;">
                        <button class="btn btn-outline-secondary decrement" type="button">-</button>
                        <input type="number" class="form-control text-center quantity-input" 
                               data-product-id="{{ $producto->juegos_Id }}" 
                               data-price="{{ $producto->precio }}"
                               value="0" min="0" max="{{ $producto->cantidad_dispo }}">
                        <button class="btn btn-outline-secondary increment" type="button">+</button>
                    </div>
                </div>
                <small class="text-muted">Stock: {{ $producto->cantidad_dispo }}</small>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
            
        <!-- Resumen del Carrito -->
        <div class="col-md-4">
            <div class="card cart-summary">
                <div class="card-header bg-black text-white">
                    <h5 class="mb-0">Resumen del Pedido</h5>
                </div>
                <div class="card-body">
                    <div id="cart-items">
                        <!-- Los productos aparecerán aquí -->
                    </div>
>>>>>>> 55ca0840ab7bf2dcfdf0647901a8e464e22f6070

<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
  <a class="navbar-brand" href="#">Mi Tienda</a>
  
  <div class="ms-auto">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ auth()->user()->nombre }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
          <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal">Cerrar sesión</button></li>
        </ul>
      </li>
    </ul>
  </div>

<<<<<<< HEAD
   <div class="cart-icon" id="cartIcon">
        <i class="bi bi-cart3 fs-4"></i>
        <span class="cart-count d-none" id="cartCount">0</span>
    </div>
</nav>
=======
                    <!-- Botón de Pagar modificado -->
                    <button type="button" class="btn btn-warning" id="checkout-button"
                        @guest disabled title="Debes iniciar sesión para comprar" @endguest
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Pagar
                    </button>
                    
                    @guest
                    <small class="text-muted d-block mt-2">¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a> para comprar</small>
                    @endguest
>>>>>>> 55ca0840ab7bf2dcfdf0647901a8e464e22f6070

<!-- Modal Confirmar Logout -->
<div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-labelledby="confirmLogoutLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmLogoutLabel">Confirmar Cierre de Sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro que quieres cerrar sesión?
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>
      </div>
    </div>
  </div>
</div>




<!-- Toast de éxito -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
  <div id="toastCompra" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        Compra realizada con éxito 🎉
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
    </div>
  </div>
</div>


{{-- Dropdown carrito --}}
<div class="cart-dropdown" id="cartDropdown">
    <div id="resumenProductos" class="small text-secondary p-2">No hay productos agregados.</div>
    <div class="cart-summary border-top">
        <p class="fw-bold">Total: $<span id="total">0.00</span></p>
        <button type="button" class="btn btn-primary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#modalPago" id="pagarBtn" disabled>
            Realizar Compra
        </button>
    </div>
</div>

<div class="container py-5">
    <h1 class="mb-4">Tienda de Juegos</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                <img src="{{ asset('storage/' . $producto->imagen) }}" 
                 alt="{{ $producto->titulo }}" 
                style="height:150px; object-fit: contain;" 
                 class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->titulo }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="text-primary fw-bold">${{ number_format($producto->precio, 2) }}</p>
                        <p class="text-muted small">Stock: {{ $producto->cantidad_dispo }}</p>
                        <button type="button"
                                class="btn btn-outline-success w-100 agregar-btn"
                                data-id="{{ $producto->juegos_Id }}"
                                data-nombre="{{ $producto->titulo }}"
                                data-precio="{{ $producto->precio }}"
                                data-img="{{ asset('storage/' . $producto->imagen) }}">
                            Agregar al carrito
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- Modal de pago (igual que antes) --}}
<div class="modal fade" id="modalPago" tabindex="-1" aria-labelledby="modalPagoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('compras.store') }}" onsubmit="return enviarFormulario()">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                <div class="row g-2">
                    <div class="col-12 mb-2">
                        <label class="form-label">Nombre en la tarjeta</label>
                        <input type="text" name="nombre_tarjeta" class="form-control form-control-sm" required>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label">Número de tarjeta</label>
                        <input type="text" name="numero_tarjeta" class="form-control form-control-sm" required maxlength="19" oninput="formatearTarjeta(this)">
                    </div>

                    <div class="col-6 mb-2">
                        <label class="form-label">Vencimiento</label>
                        <input type="text" name="fecha_vencimiento" class="form-control form-control-sm" required placeholder="MM/AA">
                    </div>

                    <div class="col-6 mb-2">
                        <label class="form-label">CVV</label>
                        <input type="text" name="codigo_cvv" class="form-control form-control-sm" maxlength="4" required>
                    </div>
                </div>

                <!-- Inputs ocultos -->
                <input type="hidden" name="total" id="totalInput">
                <div id="inputProductos"></div>

                <!-- Subtotal en el modal -->
                <div class="alert alert-info mt-2 mb-0 py-2">
                    Subtotal: $<span id="modalSubtotal">0.00</span>
                </div>
            </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Confirmar Compra</button>
                </div>
            </div>
        </form>
    </div>
</div>

@if(session('success'))
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toastEl = document.getElementById('toastCompra');
    const toast = new bootstrap.Toast(toastEl);
    toast.show();
  });
</script>
@endif

<script>
    const resumenProductos = document.getElementById('resumenProductos');
    const totalSpan = document.getElementById('total');
    const totalInput = document.getElementById('totalInput');
    const inputProductosDiv = document.getElementById('inputProductos');
    const modalSubtotal = document.getElementById('modalSubtotal');
    const pagarBtn = document.getElementById('pagarBtn');
    const cartIcon = document.getElementById('cartIcon');
    const cartDropdown = document.getElementById('cartDropdown');
    const cartCount = document.getElementById('cartCount');

    const carrito = {};

    document.querySelectorAll('.agregar-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            const nombre = btn.dataset.nombre;
            const precio = parseFloat(btn.dataset.precio);
            const img = btn.dataset.img;

            if (!carrito[id]) {
                carrito[id] = { nombre, cantidad: 1, precio, img };
            } else {
                carrito[id].cantidad += 1;
            }

            actualizarResumen();
        });
    });

    function actualizarResumen() {
        let resumen = '';
        let total = 0;
        let count = 0;
        inputProductosDiv.innerHTML = '';

        Object.entries(carrito).forEach(([id, producto]) => {
            const subtotal = producto.precio * producto.cantidad;
            total += subtotal;
            count += producto.cantidad;

            resumen += `
                <div class="cart-item">
                    <img src="${producto.img}" alt="${producto.nombre}">
                    <div class="flex-grow-1">
                        <small>${producto.nombre}</small><br>
                        <small class="text-muted">${producto.cantidad} x $${producto.precio.toFixed(2)}</small>
                    </div>
                    <button class="btn btn-sm btn-danger btn-restar" data-id="${id}">−</button>
                </div>
            `;

            const hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = `productos[${id}]`;
            hidden.value = producto.cantidad;
            inputProductosDiv.appendChild(hidden);
        });

        resumenProductos.innerHTML = resumen || 'No hay productos agregados.';
        totalSpan.textContent = total.toFixed(2);
        totalInput.value = total.toFixed(2);
        modalSubtotal.textContent = total.toFixed(2);
        pagarBtn.disabled = total === 0;

        // Mostrar contador en ícono
        cartCount.textContent = count;
        cartCount.classList.toggle('d-none', count === 0);

        // Botones de restar
        document.querySelectorAll('.btn-restar').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                if (carrito[id]) {
                    carrito[id].cantidad -= 1;
                    if (carrito[id].cantidad <= 0) {
                        delete carrito[id];
                    }
                    actualizarResumen();
                }
            });
        });
    }

    function enviarFormulario() {
        actualizarResumen();
        return true;
    }

    // Mostrar / ocultar carrito al hacer clic en ícono
    cartIcon.addEventListener('click', () => {
        cartDropdown.classList.toggle('active');
    });

    // Cerrar carrito si se hace clic fuera
    document.addEventListener('click', (e) => {
        if (!cartDropdown.contains(e.target) && !cartIcon.contains(e.target)) {
            cartDropdown.classList.remove('active');
        }
    });

    function formatearTarjeta(input) {
        let valor = input.value.replace(/\D/g, '').substring(0, 16);
        valor = valor.replace(/(\d{4})(?=\d)/g, '$1-');
        input.value = valor;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
