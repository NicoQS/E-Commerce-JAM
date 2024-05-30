<?php

namespace App\Http\Controllers;



use App\Models\Producto;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductosImport;
use RealRashid\SweetAlert\Facades\Alert;

class CargarProductoControlador extends Controller
{
    public function index(){
        return view('admin-cargar');
    }

    public function store(Request $request){
        $proveedor = $request->proveedor;
        $path = $request->file('import_file');
        Excel::import(new ProductosImport($proveedor), $path);
        Alert::success('Productos cargados correctamente');
        return redirect()->route('admin-cargar');
    }
    public function edit(Int $producto)
    {
        dd($producto);
        return view('admin-modificar-producto',[
            'producto' => $producto
        ]);
    }
    public function update(Request $request, Producto $producto){
        $producto->update($request->all());
        Alert::success('Producto modificado correctamente');
        return redirect()->route('admin-modificar');
    }
}
