<?php


namespace App\Http\Controllers\usuario;
use App\Http\Controllers\Controller;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class usuariosController extends Controller
{
    public function index()
    {
        
        $usuarios = Usuario::with('rol')->get();
        return view('viewsUsuarios.index', compact('usuarios'));
        
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $roles = Rol::all();
        return view('viewsUsuarios.crear', compact('usuarios', 'roles'));
    }

    public function guardar(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:3',
            'rol_Id' => 'required|integer',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol_Id' => $request->rol_Id, // Asignar el rol desde el formulario
        ]);
        
        return redirect()->route('usuarios.index');
     
    }


    public function editar($usuarioId)
    {
        $usuario = Usuario::find($usuarioId);
        $roles = Rol::all();
        return view('viewsUsuarios.editar', compact('usuario', 'roles'));
    }
    public function actualizar(Request $request, $id)
    {
        $validacion = Validator::make($request->all(),
            [
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:9',
            'rol_Id' => 'required|integer',
               
            ]
        );
        $usuario = Usuario::find($id);
        $usuario->update($request->all());
        return redirect()->route('usuarios.index');
     
    }
    public function eliminar($usuario_Id)
    {
        $usuario = Usuario::find($usuario_Id);
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }
}
