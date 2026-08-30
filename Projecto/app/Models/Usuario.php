<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_Id';   

    protected $fillable = ['nombre', 'email', 'password', 'rol_Id'];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_Id'); 
    }

    public function hasRole($roleName)
    {
        return optional($this->rol)->nombrerol === $roleName;
    }

    public function ordenes() 
    {
        return $this->hasMany(Orden::class, 'usuario_Id'); 
    }
}
