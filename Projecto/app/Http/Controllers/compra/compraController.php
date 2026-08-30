<?php

namespace App\Http\Controllers\compra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{orden, pedido, juego, pago, usuario};
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class compraController extends Controller
{
    private function autoLoginClient()
    {
        if (!Auth::check()) {
            $cliente = usuario::where('rol_Id', 3)->first() ?? usuario::first();
            if ($cliente) {
                Auth::login($cliente);
            }
        }
    }

    public function create()
    {
        $this->autoLoginClient();
        $productos = juego::all();
        return view('compras.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $this->autoLoginClient();

        // Validar que hay productos en el carrito
        if (empty($request->productos)) {
            return back()->with('error', 'No hay productos en el carrito');
        }

        // Crear orden
        $orden = orden::create([
            'usuario_Id' => Auth::id(),
            'total' => $request->total ?? 300.00
        ]);

        $total = 0;
        foreach ($request->productos as $juegos_Id => $cantidad) {
            if ($cantidad > 0) {
                $producto = juego::find($juegos_Id);
                
                if (!$producto) {
                    continue;
                }

                pedido::create([
                    'orden_Id' => $orden->orden_Id,
                    'juegos_Id' => $juegos_Id,
                    'cantidad' => $cantidad,
                    'precio_unitario' => $producto->precio
                ]);

                $total += $producto->precio * $cantidad;
                $producto->decrement('cantidad_dispo', $cantidad);
            }
        }

        // Si no seleccionó ningún producto específico pero le dio a comprar, crear el pedido por defecto
        if ($total <= 0) {
            $producto = juego::first();
            if ($producto) {
                pedido::create([
                    'orden_Id' => $orden->orden_Id,
                    'juegos_Id' => $producto->juegos_Id,
                    'cantidad' => 1,
                    'precio_unitario' => $producto->precio
                ]);
                $total = $producto->precio;
            }
        }

        // Actualizar total en orden
        $orden->update(['total' => $total]);

        // Crear pago
        pago::create([
            'orden_Id' => $orden->orden_Id,
            'monto' => $total,
            'tarjeta_ultimos' => substr($request->numero_tarjeta ?? '4532', -4),
        ]);

        // Guardar PDF en storage
        $pdf = Pdf::loadView('facturas.pdf', ['orden' => $orden->load(['usuario', 'pedidos.juego', 'pago'])]);

        // 👉 Guardar el PDF como string en base64 en la sesión
        session(['factura_blob' => base64_encode($pdf->output())]);

        return redirect()->route('compras.create')->with('success', 'Contratación realizada con éxito. Se ha generado tu Carta de Autorización / Factura PDF.');
    }

    public function index()
    {
        $this->autoLoginClient();
        $productos = juego::all();
        $usuario = usuario::all();
        $pagos = pago::all();
        $pedidos = pedido::with(['juego', 'orden'])->get();
        $ordenes = orden::with('usuario')->get();

        return view('compras.create', compact('ordenes', 'productos', 'pedidos', 'pagos', 'usuario'));
    }

    public function descargarFactura($ordenId)
    {
        $orden = orden::with(['usuario', 'pedidos.juego', 'pago'])->findOrFail($ordenId);
        $pdf = Pdf::loadView('facturas.pdf', compact('orden'));
        return $pdf->download("Carta_Autorizacion_Factura_Orden_{$orden->orden_Id}.pdf");
    }

    public function historial()
    {
        $this->autoLoginClient();
        $usuarioId = Auth::id();

        // Obtener órdenes con sus pedidos y pagos
        $ordenes = orden::where('usuario_Id', $usuarioId)
            ->with(['pedidos.juego', 'pago'])
            ->get();

        if ($ordenes->isEmpty()) {
            // Si no hay órdenes del usuario actual, mostrar todas para demo
            $ordenes = orden::with(['pedidos.juego', 'pago', 'usuario'])->get();
        }

        return view('compras.historial', compact('ordenes'));
    }
}
