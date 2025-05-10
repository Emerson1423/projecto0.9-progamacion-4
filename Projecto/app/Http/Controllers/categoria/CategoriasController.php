<?php

namespace App\Http\Controllers\categoria;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;


class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('viewsCategorias.index', compact('categorias'));
     
    }

    public function create()
    {
        return view('viewsCategorias.crear');
    }

    public function guardar(Request $request)
    {
        $validacion = Validator::make($request->all(),
        [
            'nombre' => 'required|string|max:50'
        ]
        );
        Categoria::create($request->all());
        return redirect()->route('caindex');
        
    }
    public function editar($categoria_Id)
    {
        $categoria = Categoria::find($categoria_Id);
        return view('viewsCategorias.editar', compact('categoria'));
    }

    public function actualizar(Request $request, $id)
    {
        $validacion = Validator::make($request->all(),
        [
            'nombre' => 'required|string|max:50'
        ]
        );
        $categoria = Categoria::find($id);
        $categoria->update($request->all());
        return redirect()->route('caindex');
    
        
    }

    public function eliminar($categoria_Id)
    {
        $categoria = Categoria::find($categoria_Id);
        $categoria->delete();
        return redirect()->route('caindex');
    }
}
    

