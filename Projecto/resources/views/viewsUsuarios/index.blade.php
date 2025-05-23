<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@extends('administracion.admin')
@section('content')

    <h1>Lista de usuario</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>email</th>
                <th>contraseña</th>
                <th>rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->usuario_Id }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->password }}</td>
                <td>{{ $usuario->rol->nombrerol }}</td>
                <td>
                    <a href="{{ route('usuarios.editar', $usuario->usuario_Id) }}">
                    <button type="button">
                    <i class="fas fa-edit"></i>
                    </button>
                    </a>
                    <form action="{{ route('usuarios.eliminar', $usuario->usuario_Id) }}" method="POST" >
                    @csrf
                    @method('DELETE')
            
                    <button type="submit">
                    <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
    
</body>
</html>