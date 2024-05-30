<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use Illuminate\Database\Query\JoinClause;
use App\Models\CategoriaProducto;
use App\Models\Carrito;
use App\Models\ItemCarrito;
use RealRashid\SweetAlert\Facades\Alert;


class Productos extends Component
{
    use WithPagination;
    public $search = '', $searchCategory='todos', $producto, $categorias, $precioDesde, $precioHasta;
    public function render()
    {
        $query = Producto::select('productos.*', 'categoria_productos.nombre as categoria')
        ->join('categoria_productos', function (JoinClause $join) {
            $join
                ->on('productos.categoria_id', '=', 'categoria_productos.id');
        });
        if ($this->search == '' and $this->searchCategory == 'todos'){
            $filtradoNC = $query;
        } else {
            if ($this->search != '' and $this->searchCategory == 'todos'){
                $filtradoNC = $query->where('productos.nombre', 'like', '%'.$this->search.'%')
                ->orWhere('categoria_productos.nombre', '=', $this->searchCategory);
            } else if($this->searchCategory != 'todos' and $this->search != ''){
                $filtradoNC = $query
                                ->where('productos.nombre', 'like', '%'.$this->search.'%')
                                ->where('categoria_productos.nombre', '=', $this->searchCategory);
            } else {
                $filtradoNC = $query->where('categoria_productos.nombre', '=', $this->searchCategory);
            }
        }


        return view('livewire.productos',[
            'productos' => $filtradoNC->whereBetween('precio',[$this->precioDesde,$this->precioHasta])->distinct()->paginate(6)
        ]);
    }

    public function mount(){
        $this->categorias = CategoriaProducto::all();
        $this->precioDesde = Producto::min('precio');
        $this->precioHasta = Producto::max('precio');
        $producto = Producto::first();
        if ($producto){
            $this->producto = $producto;
        } else {
            $this->producto = null;
        }
    }

    public function updatingSearch()
    {
        sleep(1);
        $this->resetPage();
    }

    public function updatingSearchCategory()
    {
        sleep(1);
        $this->resetPage();
    }


    public function agregarCarrito (Producto $producto){
        sleep(1);
        $carrito = Carrito::where('usuario_id', '=', auth()->user()->id)->first();
        if ($carrito){
            $itemCarrito = ItemCarrito::where('carrito_id', '=', $carrito->id)->where('producto_id', '=', $producto->id)->first();
            if ($itemCarrito){
                $itemCarrito->cantidad = $itemCarrito->cantidad + 1;
                $itemCarrito->save();
            } else {
                $itemCarrito = new ItemCarrito();
                $itemCarrito->carrito_id = $carrito->id;
                $itemCarrito->producto_id = $producto->id;
                $itemCarrito->cantidad = 1;
                $itemCarrito->save();
            }
            $carrito->total_carrito = $carrito->total_carrito + $producto->precio;
            $carrito->save();
        } else {
            $carrito = new Carrito();
            $carrito->usuario_id = auth()->user()->id;
            $carrito->total_carrito = $carrito->total_carrito + $producto->precio;
            $carrito->save();
            $itemCarrito = new ItemCarrito();
            $itemCarrito->carrito_id = $carrito->id;
            $itemCarrito->producto_id = $producto->id;
            $itemCarrito->cantidad = 1;
            $itemCarrito->save();
        }
        Alert::success('Producto agregado correctamente');
        return redirect()->route('dashboard');
    }
}
