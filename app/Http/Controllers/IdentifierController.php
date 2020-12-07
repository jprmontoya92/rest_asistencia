<?php

namespace App\Http\Controllers;

use App\Models\Identificador;
use App\Models\Reg_Identificador;
use Endroid\QrCode\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

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
        $idQrCode = Identificador::inRandomOrder()->first()->ident_id;
    
        $regIdenfier = Reg_Identificador::create(
            [
                'reg_ident_id' =>$idQrCode,
                'reg_fecha_ini' => Carbon::now(),
                'reg_fecha_fin' => Carbon::now()->addSeconds(15)
                ]
                )->save();
                
        $qrCode = new QrCode($idQrCode);
        $qrCode->setSize(100);
        $image = $qrCode->writeString();

        return base64_encode($image);
    }

   
}
