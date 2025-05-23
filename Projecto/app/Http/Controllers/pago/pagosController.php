<?php

namespace App\Http\Controllers\pago;
use App\Http\Controllers\Controller;

use App\Models\Pago;
use App\Models\Orden;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::with('orden')->get();
        return view('viewsPagos.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ordenes = Orden::all();
        return view('viewsPagos.crear', compact('ordenes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'orden_Id' => 'required|exists:ordenes,orden_Id',
            'monto' => 'required|numeric|min:0',
            'tarjeta_ultimos' => 'required|digits:4',
        ]);

        Pago::create($request->all());

        return redirect()->route('pagos.index')
            ->with('success', 'Pago registrado exitosamente.');
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
        $pago = Pago::findOrFail($id);
        $ordenes = Orden::all();
        return view('viewsPagos.editar', compact('pago', 'ordenes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'orden_Id' => 'required|exists:ordenes,orden_Id',
            'monto' => 'required|numeric|min:0',
            'tarjeta_ultimos' => 'required|digits:4',
        ]);

        $pago = Pago::findOrFail($id);
        $pago->update($request->all());

        return redirect()->route('pagos.index')
            ->with('success', 'Pago actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();

        return redirect()->route('pagos.index')
            ->with('success', 'Pago eliminado exitosamente.');
    }
}