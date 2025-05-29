<?php

namespace App\Http\Controllers\vistaJuegos;

use App\Http\Controllers\Controller;
use App\Models\{plataforma, categoria, proveedor};
use Illuminate\Http\Request;
use App\Models\Juego;

class ViewjuegosController extends Controller
{
    public function index()
    {
        $videogames = Juego::with(['plataforma', 'categoria', 'proveedor'])->get();
        
        return view('Juegos', compact('videogames'));
    }
}
