<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassportAuthController extends Controller
{
   

    public function signup(Request $request){
        // valido los datos que vienen por post
            $this->validate($request,[
                'usu_rut' =>'required|min:8',
                'name' =>'required',
                'email' => 'required|email',
                'password' => 'required|min:4'
            ]);
    
            //inserto registro en mi tabla de usuarios
    
            $user = new User([
                'usu_rut' => $request->usu_rut,
                'usu_nombre' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
    
            $user->save();
    
    
           /*  $token = $usuario->createToken('AuthApp')->accessToken; */
    
            return response()->json(['Message'=> 'Successfully created user!'],200);
    
        }
    
        public function login(Request $request){
    
            $request->validate([
                'usu_rut' =>'required|min:8',
                'password' => 'required|min:4',
    
            ]);
    
            $credentials = request(['usu_rut','password']);
    
            if(!Auth::attempt($credentials)){
                return response()->json([
                    'error' => true,
                    'message' => 'Unauthorized'
                ],401);
            }
    
            $user = $request->user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
    
            $session = new Sesion([
                ''
            ]);
    
            if($request->remember_me){
                $token->expires_at = Carbon::now()->addWeeks(1);
            }
    
            $token->save();
    
            return response()->json([
                'error' => false,
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at)->toDateTimeString(),
                'usu_rut' => $request->usu_rut
            ]);
    
        }
    
        public function logout(Request $request){
    
            $request->user()->token()->revoke();
    
            return response()->json(['message'=>'Successfully logged out']);
        }
    
    
        public function user(Request $request){
           
            return response()->json($request->user()); 
        }


}
