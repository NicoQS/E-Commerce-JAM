<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pedido;
use App\Models\User;
use App\Models\EstadoPedido;

class LiveUltimasVentas extends Component
{
    public $pedidos;

    public function render()
    {
        $this->pedidos = Pedido::with('usuario')->with('estado_pedido')->get();
        return view('livewire.live-ultimas-ventas');
    }
}
