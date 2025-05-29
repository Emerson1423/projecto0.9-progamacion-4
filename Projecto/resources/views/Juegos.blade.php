<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="{{ asset('img/vg2.png') }}" type="image/x-icon">

<link rel="stylesheet" href="{{ asset('css/Style.css') }}">
<title>Catálogo de Juegos</title>
</head>
<body>
    <nav class="navbar">
        <ul class="nav-list">
            <li><a href="{{ route('inicio') }}">Inicio</a></li>
            <li><a href="{{ route('juegos') }}">Juegos</a></li>
            <li><a href="{{ route('registro.create') }}">Comprar</a></li>
        </ul>
    </nav>

 <h1 >Catálogo de Juegos</h1>


<div class="catalog-container">
 
  <div class="game-card accion">
    <img src="{{ asset('img/caratulagta.jpeg') }}" alt="GTA" class="game-img">
    <h3>Grand Theft Auto V</h3>
    <a href="{{ route('registro.create') }}" class="btn-ver-mas">Ver más</a>
  </div>

  <div class="game-card aventura">
    <img src="{{ asset('img/caratulaspiderman.jpeg') }}" alt="Spiderman" class="game-img">
    <h3>Spiderman</h3>
    <a href="{{ route('registro.create') }}" class="btn-ver-mas">Ver más</a>
  </div>


  <div class="game-card simulacion">
    <img src="{{ asset('img/caratulaminecraft.jpeg') }}" alt="Minecraft" class="game-img">
    <h3>Minecraft</h3>
    <a href="{{ route('registro.create') }}" class="btn-ver-mas">Ver más</a>
  
  </div>

</div>

   
    <div class="cards-container">
        @foreach($videogames as $juego)
        <div class="game-card">
            @if($juego->imagen_url)
            <img src="{{ $juego->imagen_url }}" alt="{{ $juego->titulo }}" style="max-width: 100px; max-height: 100px;">
            @else
            Sin imagen
            @endif
            
            <div class="game-info">
                <h3 class="game-title">{{ $juego->titulo }}</h3>
                             
            </div>
        </div>
        @endforeach
    </div>
    <footer>
        <p>&copy; 2025 Tienda de Videojuegos. Todos los derechos reservados.</p>
        
    </footer>
</body>
</html>