<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Model implements JWTSubject // Asegúrate de implementar JWTSubject
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = [
        'ci',
        'id_rol',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'password',
    ];

    use HasFactory;

    // Relación de muchos a uno con Rol
    public function rol()
    {
        return $this->belongsTo(Roles::class, 'id_rol', 'id_rol');
    }

    // Relación de uno a muchos con Tramites
    public function tramites()
    {
        return $this->hasMany(Tramite::class, 'ci_usuario', 'ci');
    }



    // Relación de uno a muchos con Autentificacion
    public function autentificaciones()
    {
        return $this->hasMany(Autentificacion::class, 'id_usuario', 'id_usuario');
    }

    // Métodos requeridos por JWTSubject
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


}
