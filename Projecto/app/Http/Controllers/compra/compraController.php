<?php

namespace App\Http\Controllers\compra;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{orden, pedido, juego, pago,usuario};
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class compraController extends Controller
{
    public function create()
    {
        $productos = juego::all();
        return view('compras.create', compact('productos'));
     
       
    }
    

    public function store(Request $request)
    {
       if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para realizar una compra');
        }
    
        // Validar que hay productos en el carrito
        if (empty($request->productos)) {
            return back()->with('error', 'No hay productos en el carrito');
        }
    
        // Crear orden
        $orden = Orden::create([
            'usuario_Id' => Auth::id(),
            'total' => $request->total
        ]);
    
        $total = 0;
        foreach ($request->productos as $juegos_Id => $cantidad) {
            if ($cantidad > 0) {
                $producto = Juego::find($juegos_Id);
                
                if (!$producto) {
                    continue;
                }
    
                // Verificar stock disponible
                if ($producto->cantidad_dispo < $cantidad) {
                    return back()->with('error', "No hay suficiente stock para {$producto->titulo}");
                }
    
                Pedido::create([
                    'orden_Id' => $orden->orden_Id,
                    'juegos_Id' => $juegos_Id,
                    'cantidad' => $cantidad,
                    'precio_unitario' => $producto->precio
                ]);
    
                $total += $producto->precio * $cantidad;
                $producto->decrement('cantidad_dispo', $cantidad);
            }
        }
    
        // Crear pago
        Pago::create([
            'orden_Id' => $orden->orden_Id,
            'monto' => $total,
            'tarjeta_ultimos' => substr($request->numero_tarjeta, -4),
        ]);

        // Guardar PDF en storage
        $pdf = Pdf::loadView('facturas.pdf', ['orden' => $orden->load(['usuario', 'pedidos.juego', 'pago'])]);

        // 👉 Guardar el PDF como string en base64 en la sesión (sin guardarlo en disco)
        session(['factura_blob' => base64_encode($pdf->output())]);


        return redirect()->route('compras.create')->with('success', 'Compra realizada con éxito');

        


    }

     public function index()
    {
        $productos= juego::all();
        $usuario = usuario::all();
         // Relación en singular
        $pagos = Pago::all();
        $pedidos = Pedido::with(['juego', 'orden'])->get();
        $ordenes = orden::with('usuario')->get(); // "usuario" (singular) es el nombre de la relación


        return view('compras.create', compact('ordenes' , 'productos','pedidos', 'pagos', 'usuario'));
    }

    public function descargarFactura($ordenId)
    {
        $orden = orden::with(['usuario', 'pedidos.juego', 'pago'])->findOrFail($ordenId);
        $pdf = Pdf::loadView('facturas.pdf', compact('orden'));
        return $pdf->download("factura_orden_{$orden->id}.pdf");
    }
    

    public function historial()
    {
        $usuarioId = Auth::id();
        
        // Obtener órdenes con sus pedidos y pagos
        $ordenes = Orden::where('usuario_Id', $usuarioId)
            ->with(['pedidos.juego', 'pago'])
            ->get();

        // Si no hay compras
        if ($ordenes->isEmpty()) {
            return view('compras.historial', ['ordenes' => $ordenes, 'mensaje' => 'Aún no has realizado ninguna compra.']);
        }

        return view('compras.historial', compact('ordenes'));
    }



}
