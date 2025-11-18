<?php

namespace App\Http\Controllers;

use App\Models\TramiteEtapa;
use Illuminate\Http\Request;

class TramiteEtapaController extends Controller
{
    // Obtener todas las etapas de trámites
    public function index()
    {
        // Seleccionar solo los campos necesarios
        $etapas = TramiteEtapa::select('id_etapa', 'hoja_ruta', 'nombre', 'numero_etapa', 'estado', 'comentario', 'fecha')->get();

        return response()->json($etapas);
    }

    // Obtener una etapa de trámite específica por su ID
    public function show($hoja_ruta)
    {
        $etapas = TramiteEtapa::select(
            'id_etapa',
            'hoja_ruta',
            'nombre',
            'numero_etapa',
            'estado',
            'comentario',
            'fecha'
        )
        ->where('hoja_ruta', $hoja_ruta)
        ->get();

        return response()->json($etapas);
    }

    // Crear una nueva etapa para un trámite
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hoja_ruta' => 'required|exists:tramites,hoja_ruta',
            'nombre' => 'required|max:100',
            'estado' => 'required|string|max:20',
            'fecha' => 'required|date',
            'comentario' => 'nullable|max:255',
        ]);

        // Crear la nueva etapa
        TramiteEtapa::create($validatedData);

        // Retornar solo un mensaje de éxito
        return response()->json(['message' => 'Etapa creada exitosamente'], 201);
    }

    // Actualizar una etapa existente
    public function update(Request $request, $hoja_ruta, $numero_etapa)
    {
        // Buscar la etapa usando la hoja_ruta y el numero_etapa
        $etapa = TramiteEtapa::where('hoja_ruta', $hoja_ruta)
                             ->where('numero_etapa', $numero_etapa)
                             ->first();

        if (!$etapa) {
            return response()->json(['error' => 'Etapa no encontrada'], 404);
        }

        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|max:100',
            'estado' => 'sometimes|required|string|max:20',
            'fecha' => 'sometimes|required|date',
            'comentario' => 'nullable|max:255'
        ]);

        // Actualizar la etapa con los datos validados
        $etapa->update($validatedData);

        // Retornar un mensaje de éxito
        return response()->json(['message' => 'Etapa actualizada exitosamente']);
    }

    // Eliminar una etapa de trámite
    public function destroy($id_etapa)
    {
        $etapa = TramiteEtapa::where('id_etapa', $id_etapa)->first();

        if (!$etapa) {
            return response()->json(['error' => 'Etapa no encontrada'], 404);
        }

        $etapa->delete();

        // Retornar solo un mensaje de éxito
        return response()->json(['message' => 'Etapa eliminada exitosamente']);
    }
}
