@extends('administracion.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-3 mb-4 border-bottom border-secondary">
    <div>
        <h1 class="h3 text-light font-monospace m-0">Contrataciones & Órdenes de Servicio</h1>
        <p class="text-muted small m-0">Registro de transacciones de auditoría y facturas de ciberseguridad emitidas.</p>
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
                <th>ID Orden</th>
                <th>Cliente / Empresa</th>
                <th>Fecha de Emisión</th>
                <th>Monto Total (USD)</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="small">
            @foreach($ordenes as $orden)
            <tr>
                <td class="font-monospace text-muted">#{{ $orden->orden_Id }}</td>
                <td><strong class="text-light">{{ $orden->usuario->nombre ?? 'Cliente Desconocido' }}</strong></td>
                <td class="text-muted">{{ $orden->created_at ? $orden->created_at->format('d/m/Y H:i') : 'N/A' }}</td>
                <td class="font-monospace text-info fw-bold">${{ number_format($orden->total, 2) }}</td>
                <td>
                    <a href="{{ route('compras.descargar', $orden->orden_Id) }}" class="btn btn-sm btn-outline-info">
                        <i class="fas fa-file-pdf me-1"></i> Descargar Carta/Factura PDF
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection