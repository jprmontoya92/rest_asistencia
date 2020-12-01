<?php

namespace Database\Seeders;

use App\Models\Establecimiento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstablecimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Establecimiento::create([
            'esta_id' => 950,
            'esta_nombre' => 'Servicio de Salud Araucania Sur',
            'direccion' => 'Arturo Prat 969'
        ]);


    }
        
}
