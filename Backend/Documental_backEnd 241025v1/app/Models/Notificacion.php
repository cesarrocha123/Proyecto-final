<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $table = 'notificaciones';
    protected $primaryKey = 'id_notificacion';

    protected $fillable = [
        'id_usuario',
        'id_tramite_etapa',
        'mensaje',
        'leida'
    ];

    // Relación de muchos a uno con Usuario
    public function usuario()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    // Relación de muchos a uno con TramiteEtapa
    public function tramiteEtapa()
    {
        return $this->belongsTo(TramiteEtapa::class, 'id_tramite_etapa', 'id_tramite_etapa');
    }
}
