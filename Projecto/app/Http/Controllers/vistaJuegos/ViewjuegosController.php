<?php

namespace App\Http\Controllers\vistaJuegos;

use App\Http\Controllers\Controller;
use App\Models\Plataforma;
use App\Models\Categoria;
use App\Models\Proveedor;
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
