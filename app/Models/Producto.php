<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'precio',
        'stock',
        'categoria_id',
        'proveedor_id'
    ];

    public function item_carrito(){
        return $this->belongsTo(ItemCarrito::class, 'producto_id');
    }

    public function categoria_producto(){
        return $this->belongsTo(CategoriaProducto::class, 'categoria_id');
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class,'proveedor_id');
    }

    public function item_pedido(){
        return $this->belongsTo(ItemPedido::class,'pedido_id');
    }
}
