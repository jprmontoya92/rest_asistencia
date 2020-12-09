<?php

namespace App\Http\Controllers;

use App\Models\Establecimiento;
use Illuminate\Http\Request;

class InitController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()){
            return response()->json(Establecimiento::all());
        }

        
        return view('pages.init'); 
    }
}
