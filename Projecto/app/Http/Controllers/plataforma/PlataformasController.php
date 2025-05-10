<?php

namespace App\Http\Controllers\plataforma;
use App\Http\Controllers\Controller;

use App\Models\Plataforma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlataformasController extends Controller
{
    public function index()
    {
        $plataformas = Plataforma::all();
        return view('viewsPlataformas.index', compact('plataformas'));
        
    }

    public function create()
    {
        return view('viewsPlataformas.crear');
    }

    public function guardar(Request $request)
    {
        $validacion = Validator::make($request->all(),
            [
                'nombrePlataforma' => 'required|string|max:150',
               
            ]
        );
        Plataforma::create($request->all());
        return redirect()->route('plaindex');
     
    }

    public function editar($plataformaId)
    {
        $plataforma = Plataforma::find($plataformaId);
        return view('viewsPlataformas.editar', compact('plataforma'));
    }
    public function actualizar(Request $request, $id)
    {
        $validacion = Validator::make($request->all(),
            [
                'nombrePlataforma' => 'required|string|max:150',
               
            ]
        );
        $plataforma = Plataforma::find($id);
        $plataforma->update($request->all());
        return redirect()->route('plaindex');
     
    }
    public function eliminar($plataforma_Id)
    {
        $plataforma = Plataforma::find($plataforma_Id);
        $plataforma->delete();
        return redirect()->route('plaindex');
    }
}
