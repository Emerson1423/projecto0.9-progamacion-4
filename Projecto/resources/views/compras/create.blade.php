<!DOCTYPE html>
<html lang="es">
<head>
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

                    <hr>

                    <!-- Botón de Pagar modificado -->
                    <button type="button" class="btn btn-warning" id="checkout-button"
                        @guest disabled title="Debes iniciar sesión para comprar" @endguest
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Pagar
                    </button>
                    
                    @guest
                    <small class="text-muted d-block mt-2">¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a> para comprar</small>
                    @endguest

                    <!-- Mensaje de error para carrito vacío -->
                    <div id="cart-error-message" class="alert alert-danger d-none mt-2"></div>
                </div>
        
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pagar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Mensaje de error en el modal -->
                                <div id="modal-error-message" class="alert alert-danger d-none mb-3"></div>
                                
                                <form method="POST" action="{{ route('compras.store') }}">
                                    @csrf
                                    <div class="d-none" id="modal-cart-items"></div>
                                
                                    <div class="mb-3">
                                        <label class="form-label">Nombre en Tarjeta</label>
                                        <input type="text" name="nombre_tarjeta" class="form-control" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 mb-3">
                                            <label class="form-label">Número de Tarjeta</label>
                                            <input type="text" name="numero_tarjeta" class="form-control" 
                                                placeholder="4242 4242 4242 4242">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">CVV</label>
                                            <input type="text" name="cvv" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Expiración (MM/AA)</label>
                                            <input type="text" name="expiracion" class="form-control" 
                                                placeholder="12/25" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Total a Pagar</label>
                                            <input type="text" id="total-pagar-display" class="form-control" readonly>
                                            <input type="hidden" name="total" id="total-pagar">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success w-100 py-2" id="checkout-btn" disabled>
                                        <i class="bi bi-credit-card"></i> Pagar ahora
                                    </button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
<script>
document.addEventListener('DOMContentLoaded', function() {
    let cart = JSON.parse(localStorage.getItem('cart')) || {};
    let subtotal = 0;
    
    // Función para actualizar el carrito
    const updateCart = () => {
        const cartItemsContainer = document.getElementById('cart-items');
        subtotal = 0;
        let itemCount = 0;
        
        cartItemsContainer.innerHTML = '';
        
        for (const productId in cart) {
            if (cart[productId].quantity > 0) {
                const item = cart[productId];
                subtotal += item.price * item.quantity;
                itemCount += item.quantity;
                
                const itemElement = document.createElement('div');
                itemElement.className = 'mb-2';
                itemElement.innerHTML = `
                    <div class="d-flex justify-content-between">
                        <span>${item.name} x ${item.quantity}</span>
                        <span>$${(item.price * item.quantity).toFixed(2)}</span>
                    </div>
                    <input type="hidden" name="productos[${productId}]" value="${item.quantity}">
                `;
                cartItemsContainer.appendChild(itemElement);
            }
        }
        
        // Actualizar totales
        if(document.getElementById('total-pagar')) {
            document.getElementById('total-pagar').value = subtotal.toFixed(2);
        }
        if(document.getElementById('total-pagar-display')) {
            document.getElementById('total-pagar-display').value = `$${subtotal.toFixed(2)}`;
        }
        if(document.getElementById('cart-count')) {
            document.getElementById('cart-count').textContent = itemCount;
        }
        if(document.getElementById('checkout-btn')) {
            document.getElementById('checkout-btn').disabled = itemCount === 0;
        }

        // Actualizar estado del botón de pago principal
        const checkoutButton = document.getElementById('checkout-button');
        if (checkoutButton) {
            checkoutButton.disabled = itemCount === 0;
            if (itemCount === 0) {
                checkoutButton.setAttribute('title', "Debes agregar productos al carrito");
            } else {
                checkoutButton.removeAttribute('title');
            }
        }
        
        if (itemCount === 0 && cartItemsContainer) {
            cartItemsContainer.innerHTML = '<p class="text-muted">Selecciona productos para agregar al carrito</p>';
        }
        
        // Guardar en localStorage
        localStorage.setItem('cart', JSON.stringify(cart));
    };

    // Función para inicializar eventos de cantidad
    const initQuantityEvents = () => {
        document.querySelectorAll('.quantity-input').forEach(input => {
            const productId = input.dataset.productId;
            const productCard = input.closest('.card');
            const productName = productCard.querySelector('.card-title').textContent.trim();
            const productPrice = parseFloat(input.dataset.price);
            
            // Inicializar el producto en el carrito si no existe
            if (!cart[productId]) {
                cart[productId] = {
                    name: productName,
                    price: productPrice,
                    quantity: 0
                };
            } else {
                // Sincronizar el valor del input con el carrito
                input.value = cart[productId].quantity;
            }
            
            // Evento para botón de incremento
            const incrementBtn = input.nextElementSibling;
            if (incrementBtn) {
                incrementBtn.addEventListener('click', () => {
                    const max = parseInt(input.max);
                    if (parseInt(input.value) < max) {
                        input.value = parseInt(input.value) + 1;
                        cart[productId].quantity = parseInt(input.value);
                        updateCart();
                    }
                });
            }
            
            // Evento para botón de decremento
            const decrementBtn = input.previousElementSibling;
            if (decrementBtn) {
                decrementBtn.addEventListener('click', () => {
                    if (parseInt(input.value) > 0) {
                        input.value = parseInt(input.value) - 1;
                        cart[productId].quantity = parseInt(input.value);
                        updateCart();
                    }
                });
            }
            
            // Evento para cambios directos en el input
            input.addEventListener('change', () => {
                let value = parseInt(input.value);
                const max = parseInt(input.max);
                
                if (isNaN(value) || value < 0) value = 0;
                if (value > max) value = max;
                
                input.value = value;
                cart[productId].quantity = value;
                updateCart();
            });
        });
    };

    // Inicializar eventos de cantidad al cargar
    initQuantityEvents();
    
    // Manejar el botón de checkout
    const checkoutButton = document.getElementById('checkout-button');
    if (checkoutButton) {
        checkoutButton.addEventListener('click', function(e) {
            const itemCount = Object.values(cart).reduce((total, item) => total + item.quantity, 0);
            
            @guest
            // Guardar el carrito antes de redirigir
            localStorage.setItem('cart', JSON.stringify(cart));
            // Redirigir a login con return URL
            e.preventDefault();
            window.location.href = "{{ route('login') }}?return_url=" + encodeURIComponent(window.location.href);
            return false;
            @endguest
            
            if (itemCount === 0) {
                e.preventDefault();
                const errorMessage = document.getElementById('cart-error-message');
                if (errorMessage) {
                    errorMessage.textContent = "No has agregado ningún producto al carrito";
                    errorMessage.classList.remove('d-none');
                    
                    setTimeout(() => {
                        errorMessage.classList.add('d-none');
                    }, 3000);
                }
                return false;
            }
            
            // Mostrar el modal si está autenticado y tiene items
            @auth
            e.preventDefault();
            const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            modal.show();
            return false;
            @endauth
        });
    }

    // Evento para cuando se abre el modal
    const exampleModal = document.getElementById('exampleModal');
    if (exampleModal) {
        exampleModal.addEventListener('show.bs.modal', function() {
            const itemCount = Object.values(cart).reduce((total, item) => total + item.quantity, 0);
            const errorMessage = document.getElementById('modal-error-message');
            
            if (errorMessage) {
                if (itemCount === 0) {
                    errorMessage.textContent = "No puedes pagar con un carrito vacío";
                    errorMessage.classList.remove('d-none');
                } else {
                    errorMessage.classList.add('d-none');
                }
            }
            
            updateCart();
            
            const form = document.querySelector('#exampleModal form');
            if (form) {
                const cartItemsContainer = form.querySelector('#modal-cart-items');
                if (cartItemsContainer) {
                    cartItemsContainer.innerHTML = '';
                    
                    for (const productId in cart) {
                        if (cart[productId].quantity > 0) {
                            const item = cart[productId];
                            const itemElement = document.createElement('div');
                            itemElement.className = 'mb-2';
                            itemElement.innerHTML = `
                                <div class="d-flex justify-content-between">
                                    <span>${item.name} x${item.quantity}</span>
                                    <span>$${(item.price * item.quantity).toFixed(2)}</span>
                                </div>
                                <input type="hidden" name="productos[${productId}]" value="${item.quantity}">
                            `;
                            cartItemsContainer.appendChild(itemElement);
                        }
                    }
                    
                    const totalPagar = form.querySelector('#total-pagar');
                    if (totalPagar) {
                        totalPagar.value = subtotal.toFixed(2);
                    }
                    
                    const totalPagarDisplay = form.querySelector('#total-pagar-display');
                    if (totalPagarDisplay) {
                        totalPagarDisplay.value = `$${subtotal.toFixed(2)}`;
                    }
                }
            }
        });
    }
    
    // Inicializar el carrito al cargar la página
    updateCart();
    
    // Verificar si hay parámetros en la URL para mostrar el modal después del login
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('checkout') && urlParams.get('checkout') === 'true') {
        const itemCount = Object.values(cart).reduce((total, item) => total + item.quantity, 0);
        if (itemCount > 0) {
            const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            modal.show();
        }
    }
});

// Mostrar modal después del login si viene del checkout
document.addEventListener('DOMContentLoaded', function() {
    @if(session('show_checkout'))
        const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
        modal.show();
    @endif
});
</script>
</body>
</html>