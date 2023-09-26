<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;


class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre_producto' => 'Capulina',
            'descripcion' => 'Deliciosa pizza de 3 carnes frias',
            'img' => '',
        ]);

    }
}
