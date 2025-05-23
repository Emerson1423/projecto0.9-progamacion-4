<?php

namespace App\Http\Controllers\pedido;
use App\Http\Controllers\Controller;


use App\Models\Pedido;
use App\Models\Orden;
use App\Models\Juego;
use Illuminate\Http\Request;

class pedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::with(['orden', 'juego'])->get();
        return view('viewsPedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ordenes = Orden::all();
        $juegos = Juego::all();
        return view('viewsPedidos.crear', compact('ordenes', 'juegos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'orden_Id' => 'required|exists:ordenes,orden_Id',
            'juegos_Id' => 'required|exists:juegos,juegos_Id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        Pedido::create($request->all());

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido creado exitosamente.');
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
        $pedido = Pedido::findOrFail($id);
        $ordenes = Orden::all();
        $juegos = Juego::all();
        return view('viewsPedidos.editar', compact('pedido', 'ordenes', 'juegos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'orden_Id' => 'required|exists:ordenes,orden_Id',
            'juegos_Id' => 'required|exists:juegos,juegos_Id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido eliminado exitosamente.');
    }
}
