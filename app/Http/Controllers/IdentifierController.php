<?php

namespace App\Http\Controllers;

use App\Models\Identificador;
use App\Models\Reg_Identificador;
use App\Models\Establecimiento;
use App\Models\PtoUbicacion;
use Endroid\QrCode\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class IdentifierController extends Controller
{

    public function index(Request $request){
        
        $establecimiento = Establecimiento::find($request->establecimiento);
        $ubicacion = PtoUbicacion::find($request->ubicacion);

        Cache::put('ubicacion',$request->ubicacion);
        
        return view('pages.form-qr',compact('establecimiento','ubicacion'));
    }

    public function getCodigoScan(){

        return response()->json([$this->qrcode()]);
    }

    private function qrcode(){

        $idQrCode = Identificador::where('ident_pto_id',Cache::get('ubicacion'))->inRandomOrder()->first()->ident_id;
    
        $regIdenfier = Reg_Identificador::create(
            [
                'reg_ident_id' =>$idQrCode,
                'reg_fecha_ini' => Carbon::now(),
                'reg_fecha_fin' => Carbon::now()->addSeconds(18)
                ]
                )->save();
                
        $qrCode = new QrCode($idQrCode);
        $qrCode->setSize(100);
        $image = $qrCode->writeString();

        return base64_encode($image);
    }

   
}
