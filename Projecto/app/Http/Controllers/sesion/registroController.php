<?php

namespace App\Http\Controllers\sesion;
use App\Http\Controllers\Controller;

use App\Models\usuario;
use Illuminate\Http\Request;


class registroController extends Controller
{
    
    public function index()
    {
        return view('login.registro');
    }

    public function create()
{
    return view('login.registro'); // Vista directa (no en subcarpeta)
}

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'email' => 'required|email|unique:usuarios,email',
        'password' => 'required|min:3',
    ]);

    usuario::create([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'rol_Id' => 3, // Cliente=3, Admin=2
    ]);

    return redirect()->route('login')->with('success', '¡Registro exitoso!');
}
}
