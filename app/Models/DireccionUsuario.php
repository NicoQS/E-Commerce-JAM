<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DireccionUsuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'direccion_1',
        'provincia',
        'localidad',
        'numero',
        'codigo_postal',
        'usuario_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function direcciones()
    {
        return $this->hasMany(DireccionUsuario::class, 'direccion_id');
    }

}
