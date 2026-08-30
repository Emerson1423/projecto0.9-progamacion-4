@extends('administracion.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-3 mb-4 border-bottom border-secondary">
    <div>
        <h1 class="h3 text-light font-monospace m-0">Sedes Registradas y Aliados Corporativos</h1>
        <p class="text-muted small m-0">Directorio de sedes oficiales de SECURE CODE S.A.S. de C.V. registradas ante el CNR.</p>
    </div>
    <div>
        <a href="{{ route('proCrear') }}" class="btn btn-sm btn-outline-info">
            <i class="fas fa-plus me-1"></i> Nueva Sede / Aliado
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
                <th>Sede / Aliado</th>
                <th>Dirección Registrada</th>
                <th>Teléfono</th>
                <th>Correo Institucional</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="small">
            @foreach($proveedores as $proveedor)
            <tr>
                <td class="font-monospace text-muted">#{{ $proveedor->proveedor_Id }}</td>
                <td><strong class="text-light">{{ $proveedor->nombre }}</strong></td>
                <td class="text-muted">{{ $proveedor->direcciom }}</td>
                <td class="font-monospace text-info">{{ $proveedor->telefono }}</td>
                <td class="font-monospace text-muted">{{ $proveedor->correo }}</td>
                <td>
                    <a href="{{ route('proEditar', $proveedor->proveedor_Id) }}" class="btn btn-sm btn-outline-warning me-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('proEliminar', $proveedor->proveedor_Id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Deseas eliminar esta sede?')">
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