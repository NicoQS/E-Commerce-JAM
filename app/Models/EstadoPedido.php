<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
    ];

    public function pedidos(){
        return $this->hasMany(Pedido::class,'estado_pedido_id');
    }
}
