<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/* 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */
Route::resource('eventos', 'EventController', ['only' => ['create','show',]]);


Route::group(['prefix' => 'auth'], function () {
  Route::post('login', 'PassportAuthController@login');
  Route::post('signup', 'PassportAuthController@signup');
  Route::get('message',function(){
    return view('message');
  })->name('message');  
  
  // Las siguientes rutas además del prefijo requieren que el usuario tenga un token válido
  Route::group(['middleware' => 'auth:api'], function() {
      Route::get('logout', 'PassportAuthController@logout');
      // Aquí agrega tus rutas de la API. En mi caso (EN MI CASO, EL TUYO PUEDE VARIAR) he agregado una de productos
      Route::post('eventos/crear', 'EventController@create');
  });
});