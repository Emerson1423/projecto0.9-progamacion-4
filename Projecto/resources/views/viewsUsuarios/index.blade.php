@extends('administracion.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-3 mb-4 border-bottom border-secondary">
    <div>
        <h1 class="h3 text-light font-monospace m-0">Gestión de Usuarios y Accesos</h1>
        <p class="text-muted small m-0">Administración de credenciales de Representantes Legales, Auditores y Clientes.</p>
    </div>
    <div>
        <a href="{{ route('usuarios.crear') }}" class="btn btn-sm btn-outline-info">
            <i class="fas fa-plus me-1"></i> Registrar Usuario
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
                <th>Nombre / Representante</th>
                <th>Correo Electrónico</th>
                <th>Rol Asignado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="small">
            @foreach($usuarios as $usuario)
            <tr>
                <td class="font-monospace text-muted">#{{ $usuario->usuario_Id }}</td>
                <td><strong class="text-light">{{ $usuario->nombre }}</strong></td>
                <td class="font-monospace text-info">{{ $usuario->email }}</td>
                <td>
                    <span class="badge {{ $usuario->rol_Id === 2 ? 'bg-primary' : 'bg-info text-dark' }} font-monospace">
                        {{ $usuario->rol->nombrerol ?? 'Sin Rol' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('usuarios.editar', $usuario->usuario_Id) }}" class="btn btn-sm btn-outline-warning me-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('usuarios.eliminar', $usuario->usuario_Id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Deseas eliminar este usuario?')">
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