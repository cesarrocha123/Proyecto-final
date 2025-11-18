<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TramiteEtapa extends Model
{
    use HasFactory;

    protected $table = 'tramite_etapas';
    protected $primaryKey = 'id_etapa';

    protected $fillable = [
        'hoja_ruta',
        'nombre',
        'numero_etapa',
        'comentario',
        'estado',
        'fecha'

    ];


    // Relación de muchos a uno con Tramite
    public function tramite()
    {
        return $this->belongsTo(Tramite::class, 'hoja_ruta', 'hoja_ruta');
    }

    // Relación de muchos a uno con Cliente
    //public function cliente()
    //{
    //    return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    //}

    // Relación de uno a muchos con Notificaciones
    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class, 'id_tramite_etapa', 'id_tramite_etapa');
    }
}
