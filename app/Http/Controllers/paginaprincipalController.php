<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\ItemCarrito;

class paginaprincipalController extends Controller
{
    public $count_carrito;


    public function index()
    {
        //Obtener la cantidad de items añadidos al carrito
        $this->count_carrito = ItemCarrito::query()->where('carrito_id', Carrito::query()->where('usuario_id', auth()->user()->id)->first()->id)->count();


        return view('paginaprincipal', ['count_carrito' => $this->count_carrito]);
    }
}
