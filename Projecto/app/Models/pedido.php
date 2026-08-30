<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'pedido_Id';
    protected $fillable = ['orden_Id', 'juegos_Id', 'cantidad', 'precio_unitario'];

    public function orden()
    {
        return $this->belongsTo(Orden::class, 'orden_Id');
    }

    public function juego()
    {
        return $this->belongsTo(Juego::class, 'juegos_Id');
    }
}
