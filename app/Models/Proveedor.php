<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cuit',
        'celular',
        'telefono',
        'direccion',
        'email',
    ];

    public function productos(){
        return $this->hasMany(Producto::class, 'proveedor_id');
    }
}
