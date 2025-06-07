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
        'password' => 'required|min:8|confirmed',
    ],[
        'nombre.required' => 'El nombre es obligatorio',
        'email.required' => 'El correo es obligatorio',
        'email.email' => 'Debe ser un correo válido',
        'email.unique' => 'Este correo ya está registrado',
        'password.required' => 'La contraseña es obligatoria',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        'password.confirmed' => 'Las contraseñas no coinciden',
    ]
);

    usuario::create([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'rol_Id' => 3, // Cliente=3, Admin=2
    ]);

    return redirect()->route('login')->with('success', '¡Registro exitoso!');
}
}
