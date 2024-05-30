<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControlador;
use App\Http\Controllers\CargarEmpresaControlador;
use App\Http\Controllers\CargarProductoControlador;
use App\Http\Controllers\CarritoControlador;
use App\Http\Controllers\MisPedidosControlador;
use App\Http\Controllers\paginaprincipalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [paginaprincipalController::class, 'index'])->name('dashboard');

    Route::get('/producto', function () {
        return view('producto');
    })->name('producto');

    Route::get('/mispedidos', [MisPedidosControlador::class, 'index'])->name('mispedidos');

    Route::get('/carrito', [CarritoControlador::class, 'index'])->name('carrito');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function (){

    Route::prefix('admin')->middleware('can:admin')->group(function () {
        Route::get('', function () {
            return view('admin');
        })->name('admin');

        Route::get('/modificar', function () {
            return view('admin-modificar');
        })->name('admin-modificar');

        Route::get('/modificar/producto', [AdminControlador::class, 'edit'])->name('admin-modificarProducto');
        Route::post('/modificar/producto', [AdminControlador::class, 'update'])->name('admin-modificarProducto');


        Route::get('/cargar', function () {
            return view('admin-cargar', [
                'proveedores' => \App\Models\Proveedor::query()->get(),
            ]);
        })->name('admin-cargar');

        Route::get('/cargarempresa', [CargarEmpresaControlador::class, 'index'])->name('admin-cargarempresa');
        Route::post('/cargarempresa', [CargarEmpresaControlador::class, 'cargarProveedor'])->name('admin-cargarempresa');

        Route::post('/cargar', [CargarProductoControlador::class, 'store'])->name('admin-cargar');
    });
});
