<?php

namespace App\Http\Controllers\Orden;
use App\Http\Controllers\Controller;
use App\Models\orden;
use App\Models\usuario;


use Illuminate\Http\Request;

class ordenesController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenes = orden::with('usuario')->get();
        return view('viewsOrdenes.index', compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = usuario::all();
        return view('viewsOrdenes.crear', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario_Id' => 'required|exists:usuarios,usuario_Id',
            'total' => 'required|numeric|min:0',
        ]);

        Orden::create($request->all());

        return redirect()->route('ordenes.index')
            ->with('success', 'Orden creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $orden = Orden::findOrFail($id);
        $usuarios = Usuario::all();
        return view('viewsOrdenes.editar', compact('orden', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'usuario_Id' => 'required|exists:usuarios,usuario_Id',
            'total' => 'required|numeric|min:0',
        ]);

        $orden = Orden::findOrFail($id);
        $orden->update($request->all());

        return redirect()->route('ordenes.index')
            ->with('success', 'Orden actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $orden = Orden::findOrFail($id);
        $orden->delete();

        return redirect()->route('ordenes.index')
            ->with('success', 'Orden eliminada exitosamente.');
    }
}
