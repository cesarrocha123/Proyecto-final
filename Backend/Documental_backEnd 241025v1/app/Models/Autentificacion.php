<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autentificacion extends Model
{
    use HasFactory;

    protected $table = 'autentificaciones';
    protected $primaryKey = 'id_autentificacion';

    protected $fillable = [
        'id_usuario',
        'token',
        'dispositivo',
        'ip',
        'expirado'
    ];

    // Relación de muchos a uno con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }
}
