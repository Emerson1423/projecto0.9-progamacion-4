<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

class juego extends Model
{
    protected $table = 'juegos';
    protected $primaryKey = 'juegos_Id';
    protected $fillable = [
        'titulo',
        'descripcion',
        'precio',
        'cantidad_dispo',
        'imagen',
        'plataforma_Id',
        'categoria_Id',
        'proveedor_Id',
    ];

    // Accesor para la URL de la imagen
    public function getImagenUrlAttribute()
    {
        return $this->imagen ? Storage::url($this->imagen) : asset('images/default-game.png');
    }
    
    // Eliminar imagen al borrar el juego
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($juego) {
            if ($juego->imagen && Storage::disk('public')->exists($juego->imagen)) {
                Storage::disk('public')->delete($juego->imagen);
            }
        });
    }
    
        
        
  
    public function plataforma()
    {
        return $this->belongsTo(Plataforma::class,  'plataforma_Id');
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class,  'categoria_Id');
    }
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class,  'proveedor_Id');
    }
}
