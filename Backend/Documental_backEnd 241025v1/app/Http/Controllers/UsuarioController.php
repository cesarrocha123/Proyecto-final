<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    protected $usuarioLista;

    public function __construct(){
        $this->usuarioLista = new Usuario();
    }

    public function index()
    {
        $usuarios = $this->usuarioLista->with('rol')->get();
        $usuarioInfo = $usuarios->map(function($usuario) {
            return [
                'ci' => $usuario->ci,
                'rol_nombre' => $usuario->rol->nombre ?? 'Rol no asignado',
                'rol_descripcion' => $usuario->rol->descripcion ?? 'Rol no asignado',
                'nombre' => $usuario->nombre,
                'apellido' => $usuario->apellido,
                'telefono' => $usuario->telefono,
                'correo' => $usuario->correo,
                'password' => $usuario->password
            ];
        });

        return response()->json([
            'status' => 200,
            'usuarios' => $usuarioInfo
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'ci' => 'required|string|max:20|unique:usuarios,ci',
            'id_rol' => 'required|exists:roles,id_rol',
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|string|email|max:100|unique:usuarios',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $usuario = Usuario::create([
                'ci' => $request->ci,
                'id_rol' => $request->id_rol,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'telefono' => $request->telefono,
                'correo' => $request->correo,
                'password' => $request->password,
            ]);

            if($usuario) {
                return response()->json([
                    'status' => 200,
                    'message' => "Usuario creado exitosamente"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message'=> "Algo salió mal!"
                ], 500);
            }
        }
    }

    public function update(Request $request, $ci)
    {
        $usuario = $this->usuarioLista->where('ci', $ci)->first();

        if (!$usuario) {
            return response()->json([
                'status' => 404,
                'message' => "Usuario no encontrado!"
            ], 404);
        }

        $validator = Validator::make($request->all(),[
            'ci' => 'required|string|max:20|unique:usuarios,ci,'.$usuario->id_usuario.',id_usuario',
            'id_rol' => 'required|exists:roles,id_rol',
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|string|email|max:100|unique:usuarios,correo,'.$usuario->id_usuario.',id_usuario',
            'password' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }

        // Actualizar los datos del usuario
        $usuario->ci = $request->ci;
        $usuario->id_rol = $request->id_rol;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->telefono = $request->telefono;
        $usuario->correo = $request->correo;

        if ($request->filled('password')) {
            $usuario->password = $request->password;
        }


        if ($usuario->save()) {
            return response()->json([
                'status' => 200,
                'message'=> "Usuario actualizado exitosamente"
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message'=> "Algo salió mal!"
            ], 500);
        }
    }

    public function show($ci)
    {
        $usuario = Usuario::where('ci', $ci)
                        ->with('rol') // Cargar la relación del rol
                        ->first();

        if ($usuario) {
            return response()->json([
                'status' => 200,
                'usuario' => [
                    'ci' => $usuario->ci,
                    'rol_nombre' => $usuario->rol->nombre ?? 'Rol no asignado',  // Añadir el nombre del rol
                    'rol_descripcion' => $usuario->rol->descripcion ?? 'Rol no asignado',  // Añadir la descripción del rol
                    'nombre' => $usuario->nombre,
                    'apellido' => $usuario->apellido,
                    'telefono' => $usuario->telefono,
                    'correo' => $usuario->correo,
                    'password' => $usuario->password
                ]
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Usuario con CI {$ci} no encontrado."
            ], 404);
        }
    }

    public function destroy($ci)
    {

        $usuario = $this->usuarioLista->where('ci', $ci)->first();

        if($usuario){
            $usuario->delete();
            return response()->json([
                'status' => 200,
                'message' => "Usuario eliminado exitosamente"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message'=> "Usuario con CI {$ci} no encontrado!"
            ], 404);
        }
    }
}
