<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Identificador;
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
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'even_tipo' => 'required',
            'even_usu_rut' => 'required',
            'even_lat' => 'required',
            'even_lng' => 'required',
            'even_ident_id' => 'required'
        ]);


        $identifier = Identificador::where('ident_id','=',$request->even_ident_id,'and')->where('ident_activo','=','S')->get();

        if(isset($identifier)){
            
            return response()->json(['message' => 'Codigo no encontrado o se encuentra desactivado'],404);

        }else{

            $event = Evento::create([
                'even_tipo'     => $request->even_tipo,
                'even_fecha'    => Carbon::now(),
                'even_usu_rut'  => $request->even_usu_rut,
                'even_lat'      => $request->even_lat,
                'even_lng'      => $request->even_lng,
                'even_ident_id' => $request->even_ident_id
            ]);
            
            $event->save();
    
            return response()->json(['Message' => 'Created Successfully',200]);
        }

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
