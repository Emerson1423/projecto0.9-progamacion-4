<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';
    protected $primaryKey = 'orden_Id';
    protected $fillable = ['usuario_Id', 'total'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'orden_Id');
    }

    public function pago()
    {
        return $this->hasOne(Pago::class, 'orden_Id');
    }

    public function usuario() 
    {
        return $this->belongsTo(Usuario::class, 'usuario_Id');
    }
}
