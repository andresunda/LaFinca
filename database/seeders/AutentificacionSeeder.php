<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Autentificacion;


class AutentificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Autentificacion::create([
            'user_id' => '1',
            'rol' => '0',
            'password' => bcrypt('asd123')
        ]);
    }
}
