<?php

namespace App\Http\Controllers\juego;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Plataforma;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JuegosController extends Controller
{
    public function index()
    {
        $videogames = Juego::with(['plataforma', 'categoria', 'proveedor'])->get();
        return view('viewsJuegos.index', compact('videogames'));
    }
    
    public function create()
    {
        $plataformas = Plataforma::all();
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();

        return view('viewsJuegos.crear', compact('plataformas', 'categorias', 'proveedores'));
    }
        
    public function guardar(Request $request)
    {
        $validacion = Validator::make($request->all(),[
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidad_dispo' => 'required|integer',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'plataforma_Id' => 'required|integer',
            'categoria_Id' => 'required|integer',
            'proveedor_Id' => 'required|integer',
        ]);
        
        if ($validacion->fails()) {
            return back()->withErrors($validacion)->withInput();
        }
        
        $data = $request->all();
        
        if ($request->hasFile('imagen')) {
            $extension = $request->file('imagen')->extension();
            $filename = Str::slug($request->titulo) . '-' . uniqid() . '.' . $extension;
            $path = $request->file('imagen')->storeAs('juegos', $filename, 'public');
            $data['imagen'] = $path;
        }
        
        Juego::create($data);
        return redirect()->route('juegos.index')->with('success', 'Juego creado exitosamente!'); 
    }

    public function editar($juegos_Id)
    {
        $videogames = Juego::findOrFail($juegos_Id);
        $plataformas = Plataforma::all();
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();

        return view('viewsJuegos.editar', compact('videogames', 'plataformas', 'categorias', 'proveedores'));
    }
    
    public function actualizar(Request $request, $id)
    {
        $validacion = Validator::make($request->all(),[
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidad_dispo' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'plataforma_Id' => 'required|integer',
            'categoria_Id' => 'required|integer',
            'proveedor_Id' => 'required|integer',
        ]);
        
        if ($validacion->fails()) {
            return back()->withErrors($validacion)->withInput();
        }
        
        $juego = Juego::findOrFail($id);
        $data = $request->except('imagen');
        
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($juego->imagen && Storage::disk('public')->exists($juego->imagen)) {
                Storage::disk('public')->delete($juego->imagen);
            }
            
            // Subir nueva imagen
            $extension = $request->file('imagen')->extension();
            $filename = Str::slug($request->titulo) . '-' . uniqid() . '.' . $extension;
            $path = $request->file('imagen')->storeAs('juegos', $filename, 'public');
            $data['imagen'] = $path;
        }
        
        $juego->update($data);
        return redirect()->route('juegos.index')->with('success', 'Juego actualizado exitosamente!');
    }

    public function eliminar($juegos_Id)
    {
        $juego = Juego::findOrFail($juegos_Id);
        $juego->delete();
        return redirect()->route('juegos.index')->with('success', 'Juego eliminado exitosamente!');
    }
}