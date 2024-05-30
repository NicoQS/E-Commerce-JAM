<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoControlador extends Controller
{
    public function index(){
        return view('carrito');
    }
}
