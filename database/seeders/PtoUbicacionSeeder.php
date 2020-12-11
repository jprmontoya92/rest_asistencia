<?php

namespace Database\Seeders;

use App\Models\PtoUbicacion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PtoUbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PtoUbicacion::create([
            'pto_id' => 1,
            'pto_nombre' =>'Prat 969',
            'pto_descripcion' => 'Entrada Primer Piso',
            'pto_lat' => -38.7431317,
            'pto_lng' => -72.5936477,
            'pto_esta_id' => 950
        ]);

        PtoUbicacion::create([
            'pto_id' => 2,
            'pto_nombre' =>'Bello Informatica',
            'pto_descripcion' => 'Entrada Bello Informatica',
            'pto_lat' => -38.7431317,
            'pto_lng' => -72.5936477,
            'pto_esta_id' => 950
        ]);


        PtoUbicacion::create([
            'pto_id' => 3,
            'pto_nombre' =>'Bello 888 Abastecimiento',
            'pto_descripcion' => 'Entrada Abastecimeinto 888',
            'pto_lat' => -38.7431317,
            'pto_lng' => -72.5936477,
            'pto_esta_id' => 950
        ]);

    }
}
