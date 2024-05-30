<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;

class ProductosInicio extends Component
{
    public function render()
    {
        return view('livewire.productos-inicio', [
            'productos' => Producto::inRandomOrder()->take(8)->get()
        ]);
    }
}
