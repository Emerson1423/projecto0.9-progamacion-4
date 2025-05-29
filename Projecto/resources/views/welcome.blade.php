<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link rel="icon" href="{{ asset('img/vg2.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
</head>

<body>
    

    <nav class="navbar">
        <!-- <img src="{{ asset('img/vg2.png') }}" alt="Logo ViceGames" class="logo-navbar"> -->
        <ul class="nav-list">
            <li><a href="{{ route('inicio') }}">Inicio</a></li>
            <li><a href="{{ route('juegos') }}">Juegos</a></li>
            <li><a href="{{ route('registro.create') }}">Comprar</a></li>
        </ul>
    </nav>

    <h2 class="section-title">¡Bienvenido a ViceGames!</h2>

    <div class="card-container">

    <a href="{{ route('juegos') }}" class="card-link">
        <div class="card">
            <div class="wrapper">
                <img src="{{ asset('img/caratulagta.jpeg') }}" class="cover-image" />
            </div>
            <img src="{{ asset('img/charactergta.png') }}" class="character"/>
        </div>
    </a>
    <a href="{{ route('juegos') }}" class="card-link">
        <div class="card">
            <div class="wrapper">
                <img src="{{ asset('img/caratulaspiderman.jpeg') }}" class="cover-image" />
            </div>
            <img src="{{ asset('img/characterspiderman.png') }}" class="character"/>
        </div>
    </a>
    <a href="{{ route('juegos') }}" class="card-link">
        <div class="card">
            <div class="wrapper">
                <img src="{{ asset('img/caratulaminecraft.jpeg') }}" class="cover-image" />
            </div>
            <img src="{{ asset('img/characterminecraft.png') }}" class="character"/>
        </div>
    </a>

</div>

    <footer>
        <p>&copy; 2025 Tienda de Videojuegos. Todos los derechos reservados.</p>
        
    </footer>
</body>
</html>
