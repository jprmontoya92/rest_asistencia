<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
            'usu_rut'=> 22222222,
            'usu_nombre' => 'Pedro Juan',
            'email' => 'prueba@prueba.com',
            'password' => '123456'
         ]);
    }
}
