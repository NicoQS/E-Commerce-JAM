<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCarrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrito_id',
        'producto_id',
        'cantidad',
    ];

    public function carrito(){
        return $this->belongsTo(Carrito::class, 'carrito_id');
    }

    public function producto(){
        return $this->hasOne(Producto::class,'producto_id');
    }
}
