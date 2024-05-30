<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Carrito;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\DireccionUsuario;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        #Crear Empresa
        \App\Models\Proveedor::factory()->create([
            'nombre' => 'Empresa_1',
            'email' => 'Empresa1@gmail.com',
            'direccion' => 'Calle 1',
            'celular' => '0987654321',
            'telefono' => '7654321',
            'cuit' => '12345678901',
        ]);

        \App\Models\Proveedor::factory()->create([
            'nombre' => 'Empresa_2',
            'email' => 'Empresa2@gmail.com',
            'direccion' => 'Calle 2',
            'celular' => '0940404321',
            'telefono' => '3431321',
            'cuit' => '12345678903',
        ]);

        $this->call(RolSeeder::class);
        User::create([
            'name' => 'Nico',
            'email' => 'nico@gmail.com',
            'password' => Hash::make('12345678'),
            'celular' => '1234567890',
            'telefono' => '1234567',
        ])->assignRole('admin');

        DireccionUsuario::create([
            'usuario_id' => User::where('email', 'nico@gmail.com')->first()->id,
            'numero' => 13,
            'direccion_1' => 'Calle 1',
            'provincia' => 'San Juan',
            'localidad' => 'San Juan',
            'codigo_postal' => 5400,
        ]);
        Carrito::factory()->create([
            'usuario_id' => User::where('email', 'nico@gmail.com')->first()->id,
            'total_carrito' => 0,
        ]);
        #CategoriaProducto::factory(4)->create();

        //elimina si existe
        //Storage::deleteDirectory('public/productos');
        //crea si no existe
        //Storage::makeDirectory('public/productos');
    }
}
