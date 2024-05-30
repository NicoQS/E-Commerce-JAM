<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'direccion_id',
        'estado_pedido_id',
        'total_pedido',
    ];

    public function usuario(){
        return $this->belongsTo(User::class,'usuario_id');
    }

    public function direccion_pedido(){
        return $this->belongsTo(DireccionUsuario::class,'direccion_id');
    }

    public function estado_pedido(){
        return $this->belongsTo(EstadoPedido::class,'estado_pedido_id');
    }

    public function items_pedido(){
        return $this->hasMany(ItemPedido::class, 'pedido_id');
    }
}
