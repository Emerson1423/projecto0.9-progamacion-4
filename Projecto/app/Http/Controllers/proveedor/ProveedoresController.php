<?php

namespace App\Http\Controllers\proveedor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Validator;

class ProveedoresController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('viewsProveedores.index', compact('proveedores'));
        
    }

    public function create()
    {
        return view('viewsProveedores.crear');
    }

    public function guardar(Request $request)
    {
        $validacion = Validator::make($request->all(),[
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:100',
            'direcciom' => 'required|string|max:255',

        ]);

        Proveedor::create($request->all());
        return redirect()->route('proindex');
    }

    public function editar($proveedorId)
    {
        $proveedores = Proveedor::find($proveedorId);
        return view('viewsProveedores.editar', compact('proveedores'));
    }
    public function actualizar(Request $request, $id)
    {
        $validacion = Validator::make($request->all(),[
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:100',
            'direcciom' => 'required|string|max:255',

        ]);

        $proveedores = Proveedor::find($id);
        $proveedores->update($request->all());
        return redirect()->route('proindex');
    }
    public function eliminar($proveedor_Id)
    {
        $proveedores = Proveedor::find($proveedor_Id);
        $proveedores->delete();
        return redirect()->route('proindex');
    }
}
