<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'ci',
        'nombre',
        'apellido',
        'telefono',
        'direccion',
        'correo',
        'password',
    ];

    public function tramites()
    {
        return $this->hasMany(Tramite::class, 'ci_cliente', 'ci');
    }

    // Relación de uno a muchos con Notificaciones
    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class, 'id_cliente', 'id_cliente');
    }
}
