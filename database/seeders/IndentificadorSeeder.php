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


        for($a = 1; $a<4; $a++ )
            for($i = 0; $i<100; $i++){
                Identificador::create([
                    'ident_id' => bin2hex(openssl_random_pseudo_bytes(20)),
                    'ident_pto_id' => $a
                ]);
            }
    }
}
