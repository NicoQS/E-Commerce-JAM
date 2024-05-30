<?php

namespace App\Imports;

use App\Models\CategoriaProducto;
use App\Models\Producto;
use App\Models\Proveedor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductosImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    private $proveedor;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct($proveedor)
    {
        $this->proveedor = $proveedor;
    }

    public function model(array $row)
    {
        $categoriaProducto = CategoriaProducto::where('nombre', $row['categoria']);
        if ($row['categoria'] != null) {
            if ($categoriaProducto->exists()) {
                $categoria_id = $categoriaProducto->first()->id;
            } else {
                $categoria_id = CategoriaProducto::create(['nombre' => $row['categoria']])->id;
            }
        }
        $proveedor_id = Proveedor::where('id', $this->proveedor)->first()->id;
        return new Producto([
            'nombre' => $row['nombre'],
            'descripcion' => $row['descripcion'],
            'precio' => $row['precio'],
            'stock' => $row['stock'],
            'proveedor_id' => $proveedor_id,
            'categoria_id' => $categoria_id,
            'imagen' => 'productos/'.$row['imagen'],
        ]);
    }

    #Estas funciones son para muchos productos por ahora solo 20
    public function batchSize(): int
    {
        return 20;
    }

    public function chunkSize(): int
    {
        return 20;
    }

}
