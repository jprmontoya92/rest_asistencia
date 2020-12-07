<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Identificador;
use App\Models\Reg_Identificador;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events_array = array();

         $this->validate($request,[
            'even_usu_rut' => 'required'
        ]);
        
        $events = Evento::where('even_usu_rut','=',$request->even_usu_rut)->whereMonth('created_at', Carbon::now()->month)->get();
        
        if(count($events) !=0){

            foreach($events as $row){
                    
                $even_mes = new Carbon($row->even_fecha);
                $even_fecha = new Carbon($row->created_at);

                $data = array(
                    "even_tipo" => $row->even_tipo,
                    "even_mes" => strtoupper($even_mes->monthName),
                    "even_fecha" => $even_fecha->isoFormat('LLLL')
                );
                array_push($events_array,$data);
            }

            return response()->json(['eventos' => $events_array]);

        }else{

            return response()->json([
                'eventos' =>[
                    array(
                    "even_tipo" => 'Sin marca',
                    "even_mes" => strtoupper(Carbon::now()->monthName),
                    "even_fecha" => 'Sin marca')
                    ]]);
        }

        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //valido lo que viene por request

        $this->validate($request,[
            'even_tipo'     => 'required',
            'even_usu_rut'  => 'required',
            'even_lat'      => 'required',
            'even_lng'      => 'required',
            'even_ident_id' => 'required'
        ]);

            // obtengo un objeto de reg_identificador para obtener el campo reg_fecha_fin
        $identifier = Reg_Identificador::where('reg_ident_id','=',$request->even_ident_id)->orderBy('created_at','desc')->first();

            //verifico si la variable esta definida
        if(isset($identifier)){
            
            //instancio carbon y le paso reg_fecha_fin
            $reg_fecha_fin   =   new Carbon($identifier->reg_fecha_fin);
            //obtnego la fecha actual
            $fecCodigoQr =   Carbon::now();

            //pregunto si reg_fecha_fin es mayor que $fecCodigoQr(toma la fecha cuando el usuario envie un identificador)
             if($reg_fecha_fin->greaterThan($fecCodigoQr)){
              
                $event = Evento::create([
                    'even_tipo'     => $request->even_tipo,
                    'even_fecha'    => Carbon::now(),
                    'even_usu_rut'  => $request->even_usu_rut,
                    'even_lat'      => $request->even_lat,
                    'even_lng'      => $request->even_lng,
                    'even_ident_id' => $request->even_ident_id
                ]);
                
                $event->save();
        
                return response()->json(['error' => false,'message' =>'Evento Guardado',200]);
             
            }else{
                return response()->json([
                    'error' => true,
                    'message' =>'Codigo no vigente. Intentar nuevamente'
                    ]);
             }


        }else{

            return response()->json(['error' => true, 'message' => 'Codigo no valido'.$identifier],404);
        }

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store($id)
    {

     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
  
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
