<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'total_carrito',
    ];

    public function usuario(){
        return $this->belongsTo(User::class,'usuario_id');
    }

    public function items_carrito(){
        return $this->hasMany(ItemCarrito::class, 'carrito_id');
    }
}
