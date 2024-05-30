<?php

namespace App\Livewire;



use App\Models\Producto;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ModificarProducto extends Component
{
    public $search='', $producto,$mostrarProducto, $open=false, $identificador, $imagen;
    protected $rules = [
        'mostrarProducto.titulo' => 'required',
        'mostrarProducto.descripcion' => 'required',
        'mostrarProducto.stock' => 'required',
        'mostrarProducto.precio' => 'required',
        'mostrarProducto.categoria' => 'required',
    ];
    public function render()
    {
        $filtrado = Producto::where('nombre','like' , '%'.$this->search.'%')
                ->union(Producto::join('categoria_productos', function (JoinClause $join) {
                    $join
                        ->on('productos.categoria_id', '=', 'categoria_productos.id')
                        ->where('categoria_productos.nombre','=' , $this->search);
                })->select('productos.*'));
        return view('livewire.modificar-producto', [
            'productos' => $filtrado->distinct()->paginate(8)
        ]);
    }

    public function mount(){
        $producto = Producto::first();
        if ($producto){
            $this->producto = $producto;
            $this->mostrarProducto = $producto->toArray();
        } else {
            $this->producto = null;
            $this->mostrarProducto = null;
        }
    }

    public function updatingSearch()
    {
        sleep(1);
        $this->resetPage();
    }

    public function editar(Producto $p){
        $this->reset(['imagen']);
        $this->identificador = rand();
        $this->mostrarProducto = $p->toArray(); #para mostrar en la vista
        $this->producto = $p; #para guardar el modelo en la base de datos
        $this->open = true;
    }

    public function guardar(){
        if ($this->imagen){
            $this->validateOnly('imagen',['imagen' => 'required|image']);
            Storage::disk('public/productos')->delete($this->producto->imagen);
            $this->mostrarProducto['imagen'] = $this->imagen->store('productos','public/productos');
            $this->producto->imagen = $this->mostrarProducto['imagen'];
        }
        $this->producto->update($this->mostrarProducto);
        $this->validate();
        $this->producto->save();
        $this->reset(['open','imagen']);
    }
    public function eliminar(Producto $p){
        Storage::disk('public/productos')->delete($p->imagen);
        $p->delete();
    }
}
