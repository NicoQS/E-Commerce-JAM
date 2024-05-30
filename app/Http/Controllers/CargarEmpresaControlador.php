<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use RealRashid\SweetAlert\Facades\Alert;

class CargarEmpresaControlador extends Controller
{
    public function index()
    {
        return view('admin-cargarempresa');
    }

    public function cargarProveedor(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor->nombre = $request->nombre;
        $proveedor->cuit = $request->cuit;
        $proveedor->telefono = $request->telefono;
        $proveedor->celular = $request->celular;
        $proveedor->email = $request->email;
        $proveedor->direccion = $request->direccion;
        $proveedor->save();
        Alert::success('Proveedor cargado correctamente');
        return redirect()->route('admin-cargar');
    }
}
