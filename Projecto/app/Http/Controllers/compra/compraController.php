<?php

namespace App\Http\Controllers\compra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{orden, pedido, juego, pago,usuario};
use Illuminate\Support\Facades\Auth;

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
    
        return redirect()->route('compras.create')->with('success', 'Compra realizada con éxito'); 
        
<<<<<<< HEAD
=======
         // Limpiar carrito
        
            return redirect()->route('compras.index')
                ->with('success', 'Compra realizada con éxito!')
                ->with('clearCart', true); // Enviar señal para limpiar carrito
>>>>>>> 55ca0840ab7bf2dcfdf0647901a8e464e22f6070
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


}
