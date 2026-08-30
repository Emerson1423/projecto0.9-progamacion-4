@extends('administracion.admin')

@section('content')
<div class="card bg-dark text-light border-secondary shadow">
    <div class="card-header bg-black border-secondary d-flex justify-content-between align-items-center">
        <h4 class="mb-0 text-info font-monospace"><i class="fas fa-plus-circle me-2"></i>Registrar Nuevo Servicio de Ciberseguridad</h4>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger bg-dark text-danger border-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('juegos.guardar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="titulo" class="form-label small text-muted font-monospace">Nombre del Servicio / Objeto Social</label>
                    <input type="text" class="form-control bg-black text-light border-secondary" name="titulo" value="{{ old('titulo') }}" required placeholder="Ej. Auditoría Técnica y Pentesting">
                </div>
                <div class="col-md-6">
                    <label for="precio" class="form-label small text-muted font-monospace">Precio Base (USD)</label>
                    <input type="number" step="0.01" min="0" class="form-control bg-black text-light border-secondary" name="precio" value="{{ old('precio') }}" required placeholder="350.00">
                </div>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label small text-muted font-monospace">Descripción Detallada del Servicio</label>
                <textarea class="form-control bg-black text-light border-secondary" name="descripcion" rows="3" required placeholder="Describa el alcance del servicio de auditoría, hardening o pentesting...">{{ old('descripcion') }}</textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="cantidad_dispo" class="form-label small text-muted font-monospace">Cupos / Disponibilidad</label>
                    <input type="number" min="0" class="form-control bg-black text-light border-secondary" name="cantidad_dispo" value="{{ old('cantidad_dispo', 50) }}" required>
                </div>
                <div class="col-md-4">
                    <label for="plataforma_Id" class="form-label small text-muted font-monospace">Plataforma Evaluada</label>
                    <select class="form-select bg-black text-light border-secondary" name="plataforma_Id" required>
                        <option value="">Seleccione la plataforma</option>
                        @foreach ($plataformas as $plataforma)
                            <option value="{{ $plataforma->plataforma_Id }}" {{ old('plataforma_Id') == $plataforma->plataforma_Id ? 'selected' : '' }}>
                                {{ $plataforma->nombrePlataforma }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="categoria_Id" class="form-label small text-muted font-monospace">Categoría de Auditoría</label>
                    <select class="form-select bg-black text-light border-secondary" name="categoria_Id" required>
                        <option value="">Seleccione la categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->categoria_Id }}" {{ old('categoria_Id') == $categoria->categoria_Id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="proveedor_Id" class="form-label small text-muted font-monospace">Sede / Aliado Responsable</label>
                    <select class="form-select bg-black text-light border-secondary" name="proveedor_Id" required>
                        <option value="">Seleccione la sede</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->proveedor_Id }}" {{ old('proveedor_Id') == $proveedor->proveedor_Id ? 'selected' : '' }}>
                                {{ $proveedor->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="imagen" class="form-label small text-muted font-monospace">ImagenPromocional / Icono</label>
                    <input type="file" class="form-control bg-black text-light border-secondary" name="imagen" accept="image/jpeg,image/png,image/jpg,image/gif" required>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('juegos.index') }}" class="btn btn-sm btn-outline-secondary">Cancelar</a>
                <button type="submit" class="btn btn-sm btn-info text-dark font-monospace fw-bold">Guardar Servicio</button>
            </div>
        </form>
    </div>
</div>
@endsection