<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassportAuthController extends Controller
{
    public function registro(Request $request){
    // valido los datos que vienen por post
        $this->validate($request,[
            'rut' =>'required|min:8',
            'nombre' =>'required',
            'email' => 'required|email',
            'contrasena' => 'required|min:4'
        ]);

        //inserto registro en mi tabla de usuarios

        $usuario = User::create([
            'usu_rut' => $request->rut,
            'usu_nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->contrasena)
        ]);

        $token = $usuario->createToken('AuthApp')->accessToken;

        return response()->json(['token'=> $token],200);

    }

    public function login(Request $request){

        //almaceno array con los datos obtenidos por post
        $data = [
            'usu_rut' => $request->rut,
            'password' => $request->contrasena
        ];

        //autenticacion de usuario manualmente
        //se hace uso  de los servicios de autenticacion de laravel a traves del facade Auth
        //el metodo attempt acepta un array de pares llaves/valores como primer argumento. Los valores del array seran usados para encontrar el usuario en la tabla
        //de la base de datos
        //el metodo attempt retornara true si la autenticacion fue satisfactoria. Si no retornara false
        if(Auth::attempt($data)){
            // se crea un token para un usuario determinado  utilizando el metodo createToken en la instancia del modelo User.
            $token = Auth::user()->createToken('AuthAppLogin')->accessToken;
            
            return response()->json(['token'=> $token],200);

        }else{
            return response()->json(['error' => 'Acceso Denegado!'],401);
        }

    }


}
