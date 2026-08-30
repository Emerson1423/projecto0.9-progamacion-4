<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'rol_Id';

    protected $fillable = ['nombrerol'];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'usuario_Id');
    }
}
