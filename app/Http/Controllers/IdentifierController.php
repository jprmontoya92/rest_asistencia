<?php

namespace App\Http\Controllers;

use App\Models\Identificador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IdentifierController extends Controller
{
    public function index(){

         //cache se actualizara con nuevos registros cada 15 segundos 
        //cacheIdentifier es la clave con el cual se almacenaran 
        //los registros obteniddos de 
        //el segundo parametro son los minutos

        $identifier = Cache::remember('cacheIdentifier', 15/60, function () {
           return Identificador::where('ident_activo','=','S')->inRandomOrder()->first();
        });

        return view('pages.form-qr', compact('identifier'));
    }
}
