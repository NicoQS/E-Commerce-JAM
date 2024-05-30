<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pedido;
use App\Models\EstadoPedido;
use App\Models\Producto;
use App\Models\ItemPedido;
use RealRashid\SweetAlert\Facades\Alert;

class LiveMisPedidos extends Component
{
    public $pedidos, $items_pedido, $producto;
    public function render()
    {

        $this->pedidos = Pedido::where('usuario_id', auth()->user()->id)
            ->with('estado_pedido')
            ->get();
        $pedidoIds = $this->pedidos->pluck('id');
        $this->items_pedido = ItemPedido::whereIn('pedido_id', $pedidoIds)
            ->with('producto')
            ->get();


        return view('livewire.live-mis-pedidos');
    }

    public function cancelarPedido($id)
    {
        $pedido = Pedido::find($id);

        // Buscar y eliminar los items del pedido
        $itemsPedido = ItemPedido::where('pedido_id', $pedido->id)->get();
        foreach ($itemsPedido as $item) {
            $item->delete();
        }

        // Eliminar el pedido
        $pedido->delete();

        // Eliminar el estado del pedido
        $estadoPedido = EstadoPedido::find($pedido->estado_pedido_id);
        if ($estadoPedido) {
            $estadoPedido->delete();
        }

        Alert::success('Pedido cancelado', 'Se ha cancelado el pedido');
        return redirect()->route('mispedidos');
    }
}
