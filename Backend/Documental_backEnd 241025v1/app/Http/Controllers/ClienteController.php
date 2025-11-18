<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ClienteResource;



class ClienteController extends Controller
{
    protected $clienteLista;
    public function __construct()
    {
        $this->clienteLista=new Cliente();
    }

    public function index()
    {
        try {
            $clienteLi = Cliente::select(['ci', 'nombre', 'apellido', 'telefono', 'direccion', 'correo', 'password'])->get();

            if ($clienteLi->isNotEmpty()) {
                return response()->json([
                    'status' => 200,
                    'clientes' => $clienteLi
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No se encontraron clientes'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Error en el servidor: ' . $e->getMessage()
            ], 500);
        }
    }



    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'ci' => 'required|unique:clientes,ci',
                'nombre' => 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'telefono' => 'required|string|max:20',
                'direccion' => 'required|string|max:255',
                'correo' => 'required|email|unique:clientes,correo',
                'password' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ], 422);
            }

            $cliente = Cliente::create([
                'ci' => $request->ci,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
                'correo' => $request->correo,
                'password' => $request->password
            ]);

            if ($cliente) {
                return response()->json([
                    'status' => 201,
                    'message' => "Cliente creado exitosamente",
                ], 201);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Algo salió mal!"
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => "Ocurrió un error inesperado: " . $e->getMessage()
            ], 500);
        }
    }

    public function show($ci)
    {
        try {
            $cliente = Cliente::where('ci', $ci)->first();

            if($cliente) {
                return response()->json([
                    'status' => 200,
                    'cliente' => new ClienteResource($cliente)
                ], 200);
            } else{
                return response()->json([
                    'status' => 404,
                    'message'=> "Cliente no encontrado!"
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message'=> "Algo salió mal: " . $e->getMessage()
            ], 500);
        }
    }


    public function update(Request $request, $ci)
    {
        try {
            $cliente = Cliente::where('ci', $ci)->first();

            if (!$cliente) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Cliente no encontrado'
                ], 404);
            }

            $validator = Validator::make($request->all(),[
                'ci' => 'required|unique:clientes,ci,'.$cliente->id_cliente.',id_cliente',
                'nombre'=> 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'telefono'=>'required|string|max:20',
                'direccion'=>'required|string|max:255',
                'correo'=>'required|email|unique:clientes,correo,'.$cliente->id_cliente.',id_cliente',
                'password'=>'sometimes|nullable|string|min:6'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ], 422);
            }

            $cliente->ci = $request->ci;
            $cliente->nombre = $request->nombre;
            $cliente->apellido = $request->apellido;
            $cliente->telefono = $request->telefono;
            $cliente->direccion = $request->direccion;
            $cliente->correo = $request->correo;

            if ($request->filled('password')) {
                $cliente->password = $request->password;
            }

            if ($cliente->save()) {
                return response()->json([
                    'status' => 200,
                    'message'=> "Actualización Correcta!",
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message'=> "Algo salió mal!"
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message'=> "Error: " . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($ci)
    {
        try {
            $cliente = Cliente::where('ci', $ci)->first();

            if ($cliente) {
                $cliente->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Cliente eliminado exitosamente'
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Cliente no encontrado'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Error en el servidor: ' . $e->getMessage()
            ], 500);
        }
    }

}

