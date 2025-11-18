<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required',
            'password' => 'required'
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();
        if (!$usuario) {
            return response()->json([
                'error' => 'Usuario no encontrado'
            ], 404);
        }
        if ($request->password !== $usuario->password) {
            return response()->json([
                'error' => 'Contraseña incorrecta'
            ], 401);
        }
        return response()->json([
            'message' => 'Inicio de sesión correcto',
            'rol' => $usuario->rol
        ], 200);
    }

    public function updatePassword(Request $request, $ci)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6'
        ]);

        $usuario = Usuario::where('ci', $ci)->first();

        if (!$usuario) {
            return response()->json([
                'error' => 'Usuario no encontrado'
            ], 404);
        }
        if ($request->old_password !== $usuario->password) {
            return response()->json([
                'error' => 'La contraseña actual es incorrecta'
            ], 401);
        }
        $usuario->password = $request->new_password;
        $usuario->save();

        return response()->json([
            'message' => 'Contraseña actualizada correctamente'
        ], 200);
    }
}
