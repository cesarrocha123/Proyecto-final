<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;  // Importar Carbon para manejar fechas

class Tramite extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tramite';

    protected $fillable = [
        'hoja_ruta',
        'Referencia',
        'fecha_ingreso',
        'fecha_entrega',
        'id_tramite_etapa',
        'estado',
        'ci_usuario',
        'ci_cliente',
    ];

    // Definir que 'fecha_ingreso' es una fecha
    protected $dates = ['fecha_ingreso', 'fecha_entrega'];

    protected static function booted()
    {
        static::creating(function ($tramite) {
            // Si no se especifica fecha de ingreso, se asigna la fecha actual
            if (empty($tramite->fecha_ingreso)) {
                $tramite->fecha_ingreso = Carbon::now();  // Fecha actual
            }
        });

        static::created(function ($tramite) {
            $etapas = [
                'Registro de Solicitud',
                'Verificación de Requisitos',
                'Solicitud en Proceso',
                'Etapa de Entrega y Verificación',
                'Archivar Copia',
                'Finalización del Trámite'
            ];

            foreach ($etapas as $index => $nombreEtapa) {
                TramiteEtapa::create([
                    'nombre' => $nombreEtapa,
                    'numero_etapa' => $index + 1,  // número de etapa según el orden
                    'hoja_ruta' => $tramite->hoja_ruta,
                    // Asignar el estado y la fecha en la primera etapa
                    'estado' => $index === 0 ? 'Completado' : 'Pendiente',
                    'fecha' => $index === 0 ? $tramite->fecha_ingreso : null,
                    'comentario' => ''             // comentario vacío por defecto
                ]);
            }
        });
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ci_usuario', 'ci');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ci_cliente', 'ci');
    }

    public function etapas()
    {
        return $this->hasMany(TramiteEtapa::class, 'hoja_ruta', 'hoja_ruta');
    }
}
