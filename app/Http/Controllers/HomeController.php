<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Establecimiento;
use App\Models\PtoUbicacion;

class HomeController extends Controller
{

    public function index(){

        return view('pages.home');
    }

    public function getEstablecimientos(){
        $establecimientos = Establecimiento::all();

        return response()->json($establecimientos);
    }

    public function getUbicaciones(Request $request){

        $ubicaciones = PtoUbicacion::where('pto_esta_id',$request->esta_id)->get();

        return response()->json($ubicaciones);
    }
}
