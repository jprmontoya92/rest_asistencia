<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(EstablecimientoSeeder::class);
        $this->call(PtoUbicacionSeeder::class);
        $this->call(IndentificadorSeeder::class);
        $this->call(UsuarioSeeder::class);
    }
}