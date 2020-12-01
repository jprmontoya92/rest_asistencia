<?php

namespace Database\Seeders;

use App\Models\Identificador;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndentificadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<200; $i++){

            Identificador::create([
                'ident_id' => bin2hex(openssl_random_pseudo_bytes(20)),
                'ident_pto_id' => 1
            ]);

        }
      
    }
}
