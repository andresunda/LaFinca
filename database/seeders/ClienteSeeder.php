<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'nombre' => 'Emanuel',
            'apellido_paterno' => 'Escareño',
            'apellido_materno' => 'Covarrubias',
            'teléfono' => '3311632529',
        ]);
    }
}
