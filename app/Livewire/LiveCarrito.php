<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Carrito;
use App\Models\ItemCarrito;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\EstadoPedido;
use App\Models\ItemPedido;
use App\Models\DireccionUsuario;
use Illuminate\Database\Query\JoinClause;


class LiveCarrito extends Component
{
    public $item_carrito, $total=0, $cantidad_producto, $open=false;

    public function modal($band){
        if ($band) {
            $this->open=true;
        }else{
            $this->open=false;
        }
    }

    public function render()
    {
        $carritoId = Carrito::where('usuario_id', auth()->user()->id)->first()->id;

        $this->item_carrito = Producto::join('item_carritos', 'productos.id', '=', 'item_carritos.producto_id')
            ->where('item_carritos.carrito_id', $carritoId)
            ->select('productos.*', 'item_carritos.cantidad')
            ->get();
        return view('livewire.live-carrito');
    }

    //Eliminar los items del carrito
    public function eliminarItem($id)
    {
        //Eliminar el item del carrito 1 por 1 teniendo en cuenta la cantidad
        $item = ItemCarrito::where('producto_id', $id)->first();

        if ($item->cantidad > 1) {
            $item->cantidad = $item->cantidad - 1;
            $item->save();
        } else {
            $item->delete();
        }
    }

    //Crear Pedido y eliminar los items del carrito
    public function crearPedido()
    {
        $carrito = Carrito::where('usuario_id', auth()->user()->id)->first();
        $carritoId = $carrito->id;

        $this->item_carrito = Producto::join('item_carritos', 'productos.id', '=', 'item_carritos.producto_id')
            ->where('item_carritos.carrito_id', $carritoId)
            ->select('productos.*', 'item_carritos.cantidad')
            ->get();

        if (count($this->item_carrito) != 0) {
            $pedido = new Pedido();
            $pedido->usuario_id = auth()->user()->id;
            $pedido->direccion_id = DireccionUsuario::where('usuario_id', auth()->user()->id)->first()->id;
            $pedido->total_pedido = $carrito->total_carrito;

            // Crear el estado del pedido
            $estadoPedido = new EstadoPedido();
            $estadoPedido->estado = 'pendiente'; // o cualquier valor inicial que desees
            $estadoPedido->save();

            $pedido->estado_pedido_id = $estadoPedido->id;
            $pedido->save();

            foreach ($this->item_carrito as $item) {
                $itemPedido = new ItemPedido();
                $itemPedido->pedido_id = $pedido->id;
                $itemPedido->producto_id = $item->id;
                $itemPedido->cantidad = $item->cantidad;
                $itemPedido->save();
            }

            foreach ($this->item_carrito as $item) {
                ItemCarrito::where('producto_id', $item->id)->where('carrito_id', $carritoId)->delete();
            }
            $carrito->total_carrito = 0;
            $carrito->save();
        }
        return redirect()->route('carrito');
    }
}
