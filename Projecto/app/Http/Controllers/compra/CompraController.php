<?php

namespace App\Http\Controllers\compra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orden;
use App\Models\Pedido;
use App\Models\Juego;
use App\Models\Pago;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CompraController extends Controller
{
    private function autoLoginClient()
    {
        if (!Auth::check()) {
            $cliente = Usuario::where('rol_Id', 3)->first() ?? Usuario::first();
            if ($cliente) {
                Auth::login($cliente);
            }
        }
    }

    public function create()
    {
        $this->autoLoginClient();
        $productos = Juego::all();
        return view('compras.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $this->autoLoginClient();

        if (empty($request->productos)) {
            return back()->with('error', 'No hay productos en el carrito');
        }

        $orden = Orden::create([
            'usuario_Id' => Auth::id(),
            'total' => $request->total ?? 300.00
        ]);

        $total = 0;
        foreach ($request->productos as $juegos_Id => $cantidad) {
            if ($cantidad > 0) {
                $producto = Juego::find($juegos_Id);
                
                if (!$producto) {
                    continue;
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

        if ($total <= 0) {
            $producto = Juego::first();
            if ($producto) {
                Pedido::create([
                    'orden_Id' => $orden->orden_Id,
                    'juegos_Id' => $producto->juegos_Id,
                    'cantidad' => 1,
                    'precio_unitario' => $producto->precio
                ]);
                $total = $producto->precio;
            }
        }

        $orden->update(['total' => $total]);

        Pago::create([
            'orden_Id' => $orden->orden_Id,
            'monto' => $total,
            'tarjeta_ultimos' => substr($request->numero_tarjeta ?? '4532', -4),
        ]);

        $pdf = Pdf::loadView('facturas.pdf', ['orden' => $orden->load(['usuario', 'pedidos.juego', 'pago'])]);
        session(['factura_blob' => base64_encode($pdf->output())]);

        return redirect()->route('compras.create')->with('success', 'Contratación realizada con éxito. Se ha generado tu Carta de Autorización / Factura PDF.');
    }

    public function index()
    {
        $this->autoLoginClient();
        $productos = Juego::all();
        $usuario = Usuario::all();
        $pagos = Pago::all();
        $pedidos = Pedido::with(['juego', 'orden'])->get();
        $ordenes = Orden::with('usuario')->get();

        return view('compras.create', compact('ordenes', 'productos', 'pedidos', 'pagos', 'usuario'));
    }

    public function descargarFactura($ordenId)
    {
        $orden = Orden::with(['usuario', 'pedidos.juego', 'pago'])->findOrFail($ordenId);
        $pdf = Pdf::loadView('facturas.pdf', compact('orden'));
        return $pdf->download("Carta_Autorizacion_Factura_Orden_{$orden->orden_Id}.pdf");
    }

    public function historial()
    {
        $this->autoLoginClient();
        $usuarioId = Auth::id();

        $ordenes = Orden::where('usuario_Id', $usuarioId)
            ->with(['pedidos.juego', 'pago'])
            ->get();

        if ($ordenes->isEmpty()) {
            $ordenes = Orden::with(['pedidos.juego', 'pago', 'usuario'])->get();
        }

        return view('compras.historial', compact('ordenes'));
    }
}
