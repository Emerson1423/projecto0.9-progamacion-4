@extends('administracion.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-3 mb-4 border-bottom border-secondary">
    <div>
        <h1 class="h3 text-light font-monospace m-0">Plataformas e Infraestructura Evaluadas</h1>
        <p class="text-muted small m-0">Catálogo de entornos de despliegue tecnológicos de SECURE CODE S.A.S. de C.V.</p>
    </div>
    <div>
        <a href="{{ route('plaCrear') }}" class="btn btn-sm btn-outline-info">
            <i class="fas fa-plus me-1"></i> Nueva Plataforma
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
                <th width="15%">ID</th>
                <th>Nombre de Plataforma / Entorno</th>
                <th width="20%">Acciones</th>
            </tr>
        </thead>
        <tbody class="small">
            @foreach($plataformas as $plataforma)
            <tr>
                <td class="font-monospace text-muted">#{{ $plataforma->plataforma_Id }}</td>
                <td><strong class="text-light">{{ $plataforma->nombrePlataforma }}</strong></td>
                <td>
                    <a href="{{ route('plaEditar', $plataforma->plataforma_Id) }}" class="btn btn-sm btn-outline-warning me-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('plaEliminar', $plataforma->plataforma_Id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Deseas eliminar esta plataforma?')">
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