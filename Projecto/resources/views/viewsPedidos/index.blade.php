@extends('administracion.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-3 mb-4 border-bottom border-secondary">
    <div>
        <h1 class="h3 text-light font-monospace m-0">Detalle de Servicios Contratados</h1>
        <p class="text-muted small m-0">Desglose de ítems de auditoría e ingeniería por cada orden de cliente.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success bg-dark text-success border-success alert-dismissible fade show">
        <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="table-responsive">
    <table class="table table-dark table-hover align-middle border-secondary">
        <thead class="table-dark text-info font-monospace small">
            <tr>
                <th>ID Pedido</th>
                <th>Orden</th>
                <th>Servicio Contratado</th>
                <th>Cantidad / Licencias</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody class="small">
            @foreach($pedidos as $pedido)
            <tr>
                <td class="font-monospace text-muted">#{{ $pedido->pedido_Id }}</td>
                <td class="font-monospace text-info">Orden #{{ $pedido->orden_Id }}</td>
                <td><strong class="text-light">{{ $pedido->juego->titulo ?? 'N/A' }}</strong></td>
                <td><span class="badge bg-secondary font-monospace">{{ $pedido->cantidad }}</span></td>
                <td class="font-monospace text-muted">${{ number_format($pedido->precio_unitario, 2) }}</td>
                <td class="font-monospace text-info fw-bold">${{ number_format($pedido->cantidad * $pedido->precio_unitario, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection