@extends('administracion.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-3 mb-4 border-bottom border-secondary">
    <div>
        <h1 class="h3 text-light font-monospace m-0">Registro de Transacciones y Pagos</h1>
        <p class="text-muted small m-0">Histórico de pagos procesados mediante tarjetas de crédito o débito.</p>
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
                <th>ID Pago</th>
                <th>Orden ID</th>
                <th>Monto Procesado (USD)</th>
                <th>Últimos 4 Dígitos de Tarjeta</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody class="small">
            @foreach($pagos as $pago)
            <tr>
                <td class="font-monospace text-muted">#{{ $pago->pago_Id }}</td>
                <td class="font-monospace text-info">Orden #{{ $pago->orden_Id }}</td>
                <td class="font-monospace text-info fw-bold">${{ number_format($pago->monto, 2) }}</td>
                <td><span class="badge bg-secondary font-monospace">**** **** **** {{ $pago->tarjeta_ultimos }}</span></td>
                <td class="text-muted">{{ $pago->created_at ? $pago->created_at->format('d/m/Y H:i') : 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection