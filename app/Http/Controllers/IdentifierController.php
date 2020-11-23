<?php

namespace App\Http\Controllers;

use App\Models\Identificador;
use Endroid\QrCode\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IdentifierController extends Controller
{
    public function index(Request $request){
    
         if ($request->ajax()){
            return response()->json([
               ["id" => $this->qrcode()]
            ]);
        }

        return view('pages.form-qr');
    }

    private function qrcode(){

        $qrCode = new QrCode(Identificador::where('ident_activo','=','S')->inRandomOrder()->first()->ident_id);
        $qrCode->setSize(100);

        $image = $qrCode->writeString();

        return base64_encode($image);
    }
}
