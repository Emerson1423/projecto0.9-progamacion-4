<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    protected $fillable = [
        'nombre',
        'direcciom',
        'telefono',
        'correo',
        
    ];
    protected $primaryKey = 'proveedor_Id';
    protected $table = 'proveedores';

    public function juegos()
    {
        return $this->hasMany(Juego::class, 'proveedor_Id');
    }
}
