<?php

namespace App\Http\Controllers;

use App\Models\Tramite;
use Illuminate\Http\Request;

class TramiteController extends Controller
{
    public function index()
    {
        // Seleccionar solo los campos específicos
        $tramites = Tramite::select(
            'hoja_ruta',
            'Referencia',
            'fecha_ingreso',
            'fecha_entrega',
            'estado',
            'ci_usuario',
            'ci_cliente'
            )->get();

        return response()->json(['tramites' => $tramites]);
    }

    public function show($hoja_ruta)
    {
        // Seleccionar solo los campos específicos
        $tramite = Tramite::select('hoja_ruta', 'Referencia', 'fecha_ingreso', 'fecha_entrega', 'estado', 'ci_usuario', 'ci_cliente')
                            ->where('hoja_ruta', $hoja_ruta)
                            ->first();

        if (!$tramite) {
            return response()->json(['error' => 'Trámite no encontrado'], 404);
        }

        return response()->json($tramite);
    }

    // Crear un nuevo trámite
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'hoja_ruta' => 'required|unique:tramites|max:100',
            'Referencia' => 'nullable|max:100',
            'fecha_ingreso' => 'required|date',
            'fecha_entrega' => 'required|date',
            'ci_usuario' => 'required|exists:usuarios,ci',
            'ci_cliente' => 'required|exists:clientes,ci',
            'estado' => 'required|string|max:20',
        ]);

        // Crear el trámite
        Tramite::create($validatedData);

        // Retornar solo el mensaje de éxito
        return response()->json(['message' => 'Trámite creado exitosamente'], 201);
    }

    // Actualizar un trámite existente
    public function update(Request $request, $hoja_ruta)
    {
        // Buscar el trámite por su hoja de ruta
        $tramite = Tramite::where('hoja_ruta', $hoja_ruta)->first();

        if (!$tramite) {
            return response()->json(['error' => 'Trámite no encontrado'], 404);
        }

        // Validar los datos de entrada
        $validatedData = $request->validate([
            'hoja_ruta' => 'sometimes|required|max:100|unique:tramites,hoja_ruta,' . $tramite->id_tramite,
            'Referencia' => 'nullable|max:100',
            'fecha_ingreso' => 'sometimes|required|date',
            'ci_usuario' => 'sometimes|required|exists:usuarios,ci',
            'ci_cliente' => 'sometimes|required|exists:clientes,ci',
            'estado' => 'sometimes|required|string|max:20',
        ]);

        // Actualizar el trámite
        $tramite->update($validatedData);

        // Retornar solo el mensaje de éxito
        return response()->json(['message' => 'Trámite actualizado exitosamente']);
    }

    // Eliminar un trámite
    public function destroy($hoja_ruta)
    {
        // Buscar el trámite por su hoja de ruta
        $tramite = Tramite::where('hoja_ruta', $hoja_ruta)->first();

        if (!$tramite) {
            return response()->json(['error' => 'Trámite no encontrado'], 404);
        }

        // Eliminar el trámite
        $tramite->delete();

        // Retornar solo el mensaje de éxito
        return response()->json(['message' => 'Trámite eliminado exitosamente']);
    }
}
