<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad',
        'pedido_id',
        'producto_id',
    ];

    public function pedido(){
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
