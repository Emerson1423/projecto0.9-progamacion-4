<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $fillable=[
        'nombre',
    ];
    protected $primaryKey = 'categoria_Id';
    protected $table = 'categoria';

    public function juegos()
    {
        return $this->hasMany(Juego::class, 'categoria_Id', 'categoria_Id');
    }
}
