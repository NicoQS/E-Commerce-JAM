<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MisPedidosControlador extends Controller
{
    public function index()
    {
        return view('mispedidos');
    }
}

