<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plataforma extends Model
{
    protected $fillable = [
        'nombrePlataforma',
    ];
    protected $primaryKey = 'plataforma_Id';
    protected $table = 'plataformas';
    
    public function juegos()
    {
        return $this->hasMany(Juego::class, 'plataforma_Id');
    }
}
