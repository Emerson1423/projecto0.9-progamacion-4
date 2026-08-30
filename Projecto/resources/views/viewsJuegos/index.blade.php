@extends('administracion.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-3 mb-4 border-bottom border-secondary">
    <div>
        <h1 class="h3 text-light font-monospace m-0">Servicios de Ciberseguridad (Objeto Social)</h1>
        <p class="text-muted small m-0">Gestión del catálogo oficial de auditorías y consultorías de SECURE CODE S.A.S. de C.V.</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('juegos.crear') }}" class="btn btn-sm btn-outline-info">
            <i class="fas fa-plus me-1"></i> Registrar Nuevo Servicio
        </a>
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
                <th>ID</th>
                <th>Servicio / Título</th>
                <th>Precio Base</th>
                <th>Disponibilidad</th>
                <th>Plataforma</th>
                <th>Categoría</th>
                <th>Sede Responsable</th>
                <th text-align="right">Acciones</th>
            </tr>
        </thead>
        <tbody class="small">
            @foreach($videogames as $juego)
            <tr>
                <td class="font-monospace text-muted">#{{ $juego->juegos_Id }}</td>
                <td>
                    <strong class="text-light">{{ $juego->titulo }}</strong><br>
                    <span class="text-muted" style="font-size:11px;">{{ Str::limit($juego->descripcion, 60) }}</span>
                </td>
                <td class="font-monospace text-info fw-bold">${{ number_format($juego->precio, 2) }}</td>
                <td><span class="badge bg-secondary font-monospace">{{ $juego->cantidad_dispo }} cupos</span></td>
                <td class="text-muted">{{ $juego->plataforma->nombrePlataforma ?? 'N/A' }}</td>
                <td><span class="badge bg-dark text-info border border-info">{{ $juego->categoria->nombre ?? 'N/A' }}</span></td>
                <td class="text-muted small">{{ $juego->proveedor->nombre ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('juegos.editar', $juego->juegos_Id) }}" class="btn btn-sm btn-outline-warning me-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('juegos.eliminar', $juego->juegos_Id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Deseas eliminar este servicio del catálogo?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection